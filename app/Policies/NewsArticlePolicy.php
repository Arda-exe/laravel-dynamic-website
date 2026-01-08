<?php

namespace App\Policies;

use App\Models\NewsArticle;
use App\Models\User;

class NewsArticlePolicy
{
    /**
     * Determine if the user can update the article.
     */
    public function update(User $user, NewsArticle $article): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine if the user can delete the article.
     */
    public function delete(User $user, NewsArticle $article): bool
    {
        return $user->role === 'admin';
    }
}
