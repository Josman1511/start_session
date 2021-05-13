<?php
require_once "Connection.php";

class Reactions
{
    const REACTION_LIKE = 1;
    const REACTION_DISLIKE = 2;

    private function getCurrentLikesOrDislike(int $productId, int $reactionType): int
    {
        $connection = new Connection();
        $query = $connection->getPDO()->prepare("SELECT COUNT(id) FROM reactions WHERE product_id = :product_id AND reactionType = :reactionType");
        $query->bindParam("product_id", $productId);
        $query->bindParam("reactionType", $reactionType);
        $query->execute();
        $reaction = $query->fetchAll(PDO::FETCH_ASSOC);
        return $reaction[0]['COUNT(id)'];
    }

    public function getCurrentLikes(int $productId): int
    {
        return $this->getCurrentLikesOrDislike($productId, 1);
    }

    public function getCurrentDislikes(int $productId): int
    {
        return $this->getCurrentLikesOrDislike($productId, self::REACTION_DISLIKE);
    }

    private function setNewLikeOrDislike(int $productId, int $userId, int $reactionType)
    {
        $connection = new Connection();
        $userReaction = $this->getCurrentUserReaction($userId, $productId);
        if (empty($userReaction)) {
            $query = $connection->getPDO()->prepare("INSERT INTO reactions (product_id, user_id, reactionType) VALUES (:product_id, :user_id, :reactionType)");
            $query->bindParam("product_id", $productId);
            $query->bindParam("user_id", $userId);
            $query->bindParam("reactionType", $reactionType);
            $query->execute();
        }
        else{
            $query = $connection->getPDO()->prepare("UPDATE reactions SET reactionType = :reactionType WHERE product_id = :product_id AND user_id = :user_id");
            $query->bindParam('reactionType', $reactionType);
            $query->bindParam('product_id', $productId);
            $query->bindParam('user_id', $userId);
            $query->execute();
        }
    }

    public function setNewLike(int $productId, int $userId)
    {
        return $this->setNewLikeOrDislike($productId, $userId, self::REACTION_LIKE);
    }

    public function setNewDislike(int $productId, int $userId)
    {
        return $this->setNewLikeOrDislike($productId, $userId, self::REACTION_DISLIKE);
    }

    public function getCurrentUserReaction(int $currentUserId, $productId): array
    {
        $connection = new Connection();
        $query = $connection->getPDO()->prepare("SELECT * FROM reactions WHERE user_id = :user_id AND product_id = :product_id");
        $query->bindParam("user_id", $currentUserId);
        $query->bindParam('product_id', $productId);
        $query->execute();
        $reaction = $query->fetchAll(PDO::FETCH_ASSOC);
        return (empty($reaction)) ? $reaction : $reaction[0];
    }
}