<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMorphFieldsNotificationableNotifications extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('notifications', function(Blueprint $table) {
            $table->unsignedInteger('notificationable_id')->nullable();
            $table->string('notificationable_type')->nullable();
        });

        Schema::table('notifications', function(Blueprint $table) {
            $table->index(['notificationable_id', 'notificationable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('notifications', function(Blueprint $table) {
            $table->dropIndex('notifications_notificationable_id_notificationable_type_index');
            $table->dropColumn('notificationable_id');
            $table->dropColumn('notificationable_type');
        });
    }
}
