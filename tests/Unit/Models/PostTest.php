<?php

namespace Tests\Unit\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    public function test_belongs_to_user()
    {
       

        $post = Post::factory()->create();


        $this->assertInstanceOf(User::class, $post->user);
    }
}
