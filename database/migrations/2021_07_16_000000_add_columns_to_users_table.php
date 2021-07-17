<?php


use Illuminate\Database\Migrations\Migration;


class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            if (!Schema::hasColumn('users', 'firstname')) {
                $table->string('firstname')->nullable()->after('name');
            }
            if (!Schema::hasColumn('users', 'lastname')) {
                $table->string('lastname')->nullable()->after('firstname');
            }
            if (!Schema::hasColumn('users', 'locale')) {
                $table->string('locale')->nullable()->after('password');
            }
            if (!Schema::hasColumn('users', 'timezone')) {
                $table->string('timezone')->nullable()->after('locale');
            }
            if (!Schema::hasColumn('users', 'active')) {
                $table->string('active')->nullable()->after('locale');
            }
            if (!Schema::hasColumn('users', 'can_be_impersonated')) {
                $table->string('can_be_impersonated')->nullable()->after('active')->default(1)->index();
            }
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
