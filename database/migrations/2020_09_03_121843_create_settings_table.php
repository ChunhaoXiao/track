<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('网站标题');
            $table->string('real_text')->comment('查询结果为真时显示的文字');
            $table->string('fake_text')->comment('查询结果为假时显示的文字');
            $table->string('copyright')->nullable()->comment('版权信息');
            $table->string('logo')->nullable()->comment('首页logo');
            $table->text('swiper')->nullable()->comment('首页幻灯片');
            $table->boolean('enable_show_times')->default(1)->commet('前台是否显示查询次数');
            $table->integer('frequency')->nullable()->comment('两次查询最小间隔时间');
            $table->boolean('is_open')->default(1)->comment('是否开启查询');
            $table->text('ip_blacklist')->nullable()->comment('黑名单');
            $table->timestamps();
        });
        Setting::truncate();
        $datas = [
            'title' => '回溯系统',
            'real_text' => '该产品是正品',
            'fake_text' => '产品不存在',
            'enable_show_times' => 1,
            'is_open' => 1,
        ];
        Setting::create($datas);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
