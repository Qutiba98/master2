<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToInventoryRequestTable extends Migration
{
    public function up()
    {
        Schema::table('inventory_request', function (Blueprint $table) {
            $table->string('governorate'); // إضافة عمود المحافظة
            $table->text('housing_details'); // إضافة عمود تفاصيل السكن
            $table->string('number')->unique()->nullable(); // إضافة عمود الرقم
            $table->string('size'); // إضافة عمود الحجم
            $table->string('breakable'); // إضافة عمود هل يمكن كسره
            $table->string('delivery_service'); // إضافة عمود خدمة التسليم
            $table->text('message')->nullable(); // إضافة عمود الرسالة
            $table->string('payment_method')->nullable(); // إضافة عمود طريقة الدفع
            $table->string('storage_duration'); // إضافة عمود مدة التخزين
            $table->decimal('total_price', 10, 2)->nullable(); // إضافة العمود هنا

            $table->date('start_date')->nullable(); // إضافة عمود start_date لتخزين تاريخ بدء الحجز
            $table->timestamp('end_date')->nullable(); // إضافة عمود تاريخ الانتهاء

            // إضافة عمود location_id مع المفتاح الخارجي
            $table->unsignedBigInteger('location_id')->nullable(); // عمود location_id
            $table->foreign('location_id')
                  ->references('location_id')->on('inventory') // ربط location_id مع id في جدول inventory
                  ->onDelete('set null'); // أو 'cascade' حسب احتياجك
        });
    }

    public function down()
    {
        Schema::table('inventory_request', function (Blueprint $table) {
            // تحقق مما إذا كان المفتاح الخارجي موجودًا قبل حذفه
            if (Schema::hasColumn('inventory_request', 'location_id')) {
                $table->dropForeign(['location_id']); // حذف المفتاح الخارجي
                $table->dropColumn('location_id'); // حذف العمود location_id
            }

            // حذف الحقول الأخرى
            $table->dropColumn([
                'governorate', 
                'housing_details', 
                'number', 
                'size', 
                'breakable', 
                'delivery_service', 
                'payment_method', 
                'message', 
                'storage_duration',
                'total_price', // إضافة total_price هنا
                // 'end_date', // حذف end_date هنا أيضًا
            ]);
        });
    }
}
