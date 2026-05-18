<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrackingColumnsToApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->integer('current_step')->default(1)->after('vacancy_id');
            $table->integer('completion_percentage')->default(0)->after('current_step');
            $table->string('kyc_status')->default('pending')->after('status'); // pending, verified, failed
            $table->json('form_data')->nullable()->after('signature'); // To store transient form data
            $table->timestamp('last_active_at')->nullable()->after('updated_at');
        });

        Schema::table('kyc_verifications', function (Blueprint $table) {
            if (!Schema::hasColumn('kyc_verifications', 'status')) {
                $table->string('status')->default('pending')->after('is_bank_verified');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['current_step', 'completion_percentage', 'kyc_status', 'form_data', 'last_active_at']);
        });
    }
}
