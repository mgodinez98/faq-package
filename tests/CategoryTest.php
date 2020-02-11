<?php

use JaopMX\FaqPackage\Models\Category;
use JaopMX\FaqPackage\Tests\User;
use JaopMX\FaqPackage\Tests\TestCase;

class CategoryTest extends TestCase
{

	/**
	* @test
	*/
	public function it_test_that_i_can_create_a_category()
	{
        $user = factory(User::class)->create();

		$this->actingAs($user)
            ->visit('faq-package/categories')
			->click('#add-collection')
			->see('Nueva categoría')
			->type('TestCategory', '#name')
			->type('Description test', '#description')
			->press('Guardar');

		$this->seeInDatabase('faq_categories', [
			'name' => 'TestCategory',
            'description' => 'Description test'
		]);
	} 

	/**
     * @test
     */
    public function it_tests_i_can_edit_a_category()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();

        $this->actingAs($user)
            ->visit('faq-package/categories')
            ->click('#edit-category-'.$category->id)
            ->see('Editando categoría')
            ->type($category->id, '#category_id')
            ->type('Nuevo titulo', '#name')
            ->type('Nueva descripcion', '#description')
            ->press('Editar');
            
        $this->seeInDatabase('faq_categories', [
            'name' => 'Nuevo titulo',
            'slug' => Str::slug('Nuevo titulo'),
            'description' => 'Nueva descripcion'
        ]);
    }
}