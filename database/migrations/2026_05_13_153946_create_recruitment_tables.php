<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->decimal('application_fee', 10, 2)->default(0);
            $table->decimal('gst_percentage', 5, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->integer('total_seats')->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('department')->nullable();
            $table->string('employment_type')->nullable(); // Full-time, Part-time, Contract
            $table->string('age_limit')->nullable();
            $table->text('qualification')->nullable();
            $table->text('experience')->nullable();
            $table->text('selection_criteria')->nullable();
            $table->text('work_flow')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('terms_conditions')->nullable();
            $table->text('salary_structure')->nullable();
            $table->text('training_details')->nullable();
            $table->text('joining_process')->nullable();
            $table->integer('selection_rounds')->default(1);
            $table->string('hiring_timeline')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('post_required_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->string('document_name');
            $table->boolean('is_mandatory')->default(true);
            $table->timestamps();
        });

        // Add fields to users table or create a separate applicants table
        // For simplicity and following requirements of "Auto Login Applicant", 
        // I'll ensure users table has necessary fields.
        if (!Schema::hasColumn('users', 'phone')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('phone')->nullable()->unique()->after('email');
                $table->string('role')->default('applicant')->after('password');
                $table->boolean('is_phone_verified')->default(false);
                $table->boolean('is_email_verified')->default(false);
            });
        }

        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_no')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('vacancy_id')->constrained()->onDelete('cascade');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->foreignId('district_id')->nullable()->constrained()->onDelete('cascade');

            $table->enum('status', ['draft', 'submitted', 'under_review', 'approved', 'rejected'])->default('draft');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->text('signature')->nullable(); // Could be a path or SVG/JSON for signature pad
            $table->timestamps();
        });

        Schema::create('kyc_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('application_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('aadhaar_no')->nullable();
            $table->boolean('is_aadhaar_verified')->default(false);
            $table->string('pan_no')->nullable();
            $table->boolean('is_pan_verified')->default(false);
            $table->string('bank_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('account_holder')->nullable();
            $table->boolean('is_bank_verified')->default(false);
            $table->json('raw_response')->nullable();
            $table->timestamps();
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained()->onDelete('cascade');
            $table->string('document_name');
            $table->string('file_path');
            $table->string('file_type')->nullable();
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained()->onDelete('cascade');
            $table->string('transaction_id')->unique();
            $table->string('payment_gateway')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('currency')->default('INR');
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->json('gateway_response')->nullable();
            $table->timestamps();
        });

        Schema::create('otp_logs', function (Blueprint $table) {
            $table->id();
            $table->string('identifier'); // phone or email
            $table->string('otp');
            $table->timestamp('expires_at');
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('otp_logs');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('kyc_verifications');
        Schema::dropIfExists('applications');
        Schema::dropIfExists('post_required_documents');
        Schema::dropIfExists('vacancies');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('states');
        
        if (Schema::hasColumn('users', 'phone')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn(['phone', 'role', 'is_phone_verified', 'is_email_verified']);
            });
        }
    }
}
