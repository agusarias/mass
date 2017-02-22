<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Vote;

class MainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()->each(function (User $u) {
            factory(Post::class, 3)->create([
                'user_id' => $u->id,
            ])->each(function (Post $post) use ($u) {

                $votes = factory(Vote::class, 10)->make();
                $votes->each(function (Vote $vote) use ($u, $post) {
                    $aUser = User::where('id', '!=', $u->id)->get()->random();

                    $vote->user()->associate($aUser);
                    $vote->post()->associate($post);

                    $vote->save();
                });

                $comments = factory(Comment::class, 10)->make();
                $comments->each(function (Comment $comment) use ($u, $post) {
                    $aUser = User::where('id', '!=', $u->id)->get()->random();

                    $comment->user()->associate($aUser);
                    $comment->post()->associate($post);

                    $comment->save();
                });
            });

        });
    }
}
