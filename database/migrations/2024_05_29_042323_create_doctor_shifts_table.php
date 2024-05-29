<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctor_shifts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doc_id');
            $table->date('date');
            $table->integer('slot_1');
            $table->integer('slot_2');
            $table->integer('slot_3');
            $table->integer('slot_4');
            $table->integer('slot_5');
            $table->integer('slot_6');
            $table->integer('slot_7');
            $table->integer('slot_8');
            $table->integer('slot_9');
            $table->integer('slot_10');
            $table->integer('slot_11');
            $table->integer('slot_12');
            $table->integer('slot_13');
            $table->integer('slot_14');
            $table->integer('slot_15');
            $table->integer('slot_16');
            $table->integer('slot_17');
            $table->integer('slot_18');
            $table->integer('slot_19');
            $table->integer('slot_20');
            $table->integer('slot_21');
            $table->integer('slot_22');
            $table->integer('slot_23');
            $table->integer('slot_24');
            $table->integer('slot_25');
            $table->integer('slot_26');
            $table->integer('slot_27');
            $table->foreign('doc_id')
            ->references('id')
            ->on('doctors')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_shifts');
    }
};
