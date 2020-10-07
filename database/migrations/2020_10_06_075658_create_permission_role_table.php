<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('permission_id');
            $table->timestamps();

            $table->unique(['role_id', 'permission_id']);

            $table->foreign('role_id')->references('id')->on('roles')->cascadeOnDelete();
            $table->foreign('permission_id')->references('id')->on('permissions')->cascadeOnDelete();
        });

        \DB::table('permission_role')->insert(
            [
                [
                    'role_id' => 2,
                    'permission_id' => 1
                ],
                [
                    'role_id' => 2,
                    'permission_id' => 2
                ],
                [
                    'role_id' => 2,
                    'permission_id' => 3
                ],
                [
                    'role_id' => 3,
                    'permission_id' => 1
                ],
                [
                    'role_id' => 3,
                    'permission_id' => 3
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
    }
}
