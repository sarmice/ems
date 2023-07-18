<?php
namespace Tests\Feature;

use App\Models\Speaker;
use App\Models\TalkProposal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class FormSubmissionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testFormSubmission()
    {
        $response = $this->post(route('speakers.store'), [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'bio' => $this->faker->paragraph,
            'title' => $this->faker->sentence,
            'abstract' => $this->faker->paragraph,
            'preferred_time_slot' => 'Morning',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseCount('speakers', 1);
        $this->assertDatabaseCount('talk_proposals', 1);

        $speaker = Speaker::first();
        $this->assertInstanceOf(Speaker::class, $speaker);

        $talkProposal = TalkProposal::first();
        $this->assertInstanceOf(TalkProposal::class, $talkProposal);
        $this->assertEquals($speaker->id, $talkProposal->speaker_id);
    }
}
