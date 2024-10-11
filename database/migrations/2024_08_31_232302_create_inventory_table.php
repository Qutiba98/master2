<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTable extends Migration
{
    /**
     * تشغيل التهجير.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id(); // عمود رئيسي من نوع bigint مع زيادة تلقائية
            $table->string('name'); // عمود لتخزين اسم المخزون
            $table->unsignedBigInteger('location_id'); // تأكد من أن النوع bigint
            $table->unsignedInteger('total_space'); // عمود لتخزين المساحة الإجمالية

            // إضافة المفتاح الخارجي
            $table->foreign('location_id')
                ->references('id')->on('inventory_location')
                ->onDelete('cascade'); // تعديل عملية الحذف حسب الحاجة

            $table->unsignedInteger('space'); // Space should be integer, not string
            $table->timestamps(); // ينشئ عمودين لتوقيت الإنشاء والتحديث
        });
    }

    /**
     * ايلتراجع عن التهجير.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
