<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMplsTunnelCHopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpls_tunnel_c_hops', function (Blueprint $table) {
            $table->increments('c_hop_id');
            $table->unsignedInteger('mplsTunnelCHopListIndex');
            $table->unsignedInteger('mplsTunnelCHopIndex');
            $table->unsignedInteger('device_id')->index('device_id');
            $table->unsignedInteger('lsp_path_id')->nullable();
            $table->enum('mplsTunnelCHopAddrType', array('unknown','ipV4','ipV6','asNumber','lspid','unnum'))->nullable();
            $table->string('mplsTunnelCHopIpv4Addr', 15)->nullable();
            $table->string('mplsTunnelCHopIpv6Addr', 45)->nullable();
            $table->unsignedInteger('mplsTunnelCHopAsNumber')->nullable();
            $table->enum('mplsTunnelCHopStrictOrLoose', array('strict','loose'))->nullable();
            $table->string('mplsTunnelCHopRouterId', 15)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mpls_tunnel_c_hops');
    }
}
