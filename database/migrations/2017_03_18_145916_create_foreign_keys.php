<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
        Schema::table('posts', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
		Schema::table('post_tag', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('post_tag', function(Blueprint $table) {
			$table->foreign('tag_id')->references('id')->on('tags')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('category_post', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('category_post', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

		Schema::table('employees', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

		Schema::table('employees', function(Blueprint $table) {
			$table->foreign('position_id')->references('id')->on('positions')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('tasks', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('product_ofs')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('tasks', function(Blueprint $table) {
			$table->foreign('project_id')->references('id')->on('projects')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

		Schema::table('employee_tasks', function(Blueprint $table) {
			$table->foreign('emp_id')->references('id')->on('employees')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('employee_tasks', function(Blueprint $table) {
			$table->foreign('task_id')->references('id')->on('project_tasks')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('employee_tasks', function(Blueprint $table) {
			$table->foreign('Trasnferred_id')->references('id')->on('employees')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_user_id_foreign');
		});
		Schema::table('post_tag', function(Blueprint $table) {
			$table->dropForeign('post_tag_post_id_foreign');
		});
		Schema::table('post_tag', function(Blueprint $table) {
			$table->dropForeign('post_tag_tag_id_foreign');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->dropForeign('comments_user_id_foreign');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->dropForeign('comments_post_id_foreign');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->dropForeign('comments_parent_id_foreign');
		});
		Schema::table('category_post', function(Blueprint $table) {
			$table->dropForeign('category_post_category_id_foreign');
		});
		Schema::table('category_post', function(Blueprint $table) {
			$table->dropForeign('category_post_post_id_foreign');
		});
		Schema::table('employees', function(Blueprint $table) {
			$table->dropForeign('employees_city_id_foreign');
		});
		Schema::table('employees', function(Blueprint $table) {
			$table->dropForeign('employees_position_id_foreign');
		});
		Schema::table('tasks', function(Blueprint $table) {
			$table->dropForeign('tasks_product_id_foreign');
		});
		Schema::table('tasks', function(Blueprint $table) {
			$table->dropForeign('tasks_project_id_foreign');
		});
		Schema::table('employee_tasks', function(Blueprint $table) {
			$table->dropForeign('employee_tasks_emp_id_foreign');
		});
		Schema::table('employee_tasks', function(Blueprint $table) {
			$table->dropForeign('employee_tasks_task_id_foreign');
		});
	}
}
