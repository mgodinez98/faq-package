<?php

use JaopMX\FaqPackage\Models\Resource;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use JaopMX\FaqPackage\Tests\User;
use JaopMX\FaqPackage\Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ResourcesTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * @test
     */
    public function it_test_that_i_can_list_my_resources()
    {
        $user = factory(User::class)->create();
        $resource = factory(Resource::class)->create();

        $this->actingAs($user)
            ->visit('faq/resources')
            ->see('Recursos')
            ->see($resource->name);
    }

    // /**
    //  * @test
    //  */
    // public function it_tests_i_can_upload_a_resource()
    // {
    //     Storage::fake('public');

    //     $user = factory(User::class)->create();

    //     $response = $this->json('POST', 'faq/resources/upload', [
    //        'resource' => UploadedFile::fake()->image('resource.jpg')
    //     ]);

    //     Storage::disk('public')->assertExists('resource.jpg');
    // }
}