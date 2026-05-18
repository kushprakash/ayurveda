<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRecruitmentForCommunityHiring extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('panchayats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('block_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('panchayat_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('applications', function (Blueprint $table) {
            $table->foreignId('block_id')->nullable()->constrained()->onDelete('set null')->after('district_id');
            $table->foreignId('panchayat_id')->nullable()->constrained()->onDelete('set null')->after('block_id');
            $table->foreignId('village_id')->nullable()->constrained()->onDelete('set null')->after('panchayat_id');
            $table->string('gender')->nullable()->after('user_id');
            $table->date('dob')->nullable()->after('gender');
            $table->text('address')->nullable()->after('dob');
            $table->string('education')->nullable()->after('address');
            $table->text('experience')->nullable()->after('education');
        });

        Schema::table('vacancies', function (Blueprint $table) {
            $table->enum('level', ['state', 'district', 'block', 'panchayat', 'village'])->default('state')->after('state_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->dropColumn('level');
        });

        Schema::table('applications', function (Blueprint $table) {
            $table->dropConstrainedForeignId('village_id');
            $table->dropConstrainedForeignId('panchayat_id');
            $table->dropConstrainedForeignId('block_id');
            $table->dropColumn(['gender', 'dob', 'address', 'education', 'experience']);
        });

        Schema::dropIfExists('villages');
        Schema::dropIfExists('panchayats');
        Schema::dropIfExists('blocks');
    }
}
