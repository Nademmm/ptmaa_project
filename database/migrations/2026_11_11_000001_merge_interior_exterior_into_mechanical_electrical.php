<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Interior & Exterior bukan divisi tersendiri: seluruh kategori, produk, galeri,
 * artikel, dan permintaan klien yang terkait digabungkan ke divisi Mechanical & Electrical.
 * Aman dijalankan berulang dan tidak menghapus data produk/galeri/artikel.
 */
return new class extends Migration
{
    public function up(): void
    {
        $me = DB::table('service_pillars')->where('slug', 'mechanical-electrical')->first();
        $inout = DB::table('service_pillars')->where('slug', 'interior-exterior')->first();

        if ($me && $inout) {
            DB::table('product_categories')
                ->where('service_pillar_id', $inout->id)
                ->update(['service_pillar_id' => $me->id]);

            DB::table('contact_inquiries')
                ->where('service_pillar_id', $inout->id)
                ->update(['service_pillar_id' => $me->id]);

            // service_scopes ikut terhapus (cascade); lingkup Interior & Exterior diisi ulang ke ME oleh ServicePillarSeeder.
            DB::table('service_pillars')->where('id', $inout->id)->delete();
        }

        DB::table('galleries')
            ->where('category', 'interior_exterior')
            ->update(['category' => 'mechanical_electrical']);

        $inoutPostCategory = DB::table('post_categories')->where('slug', 'interior-exterior-arsitektur')->first();
        $mePostCategory = DB::table('post_categories')->where('slug', 'mechanical-electrical-impeller')->first();

        if ($inoutPostCategory && $mePostCategory) {
            DB::table('posts')
                ->where('post_category_id', $inoutPostCategory->id)
                ->update(['post_category_id' => $mePostCategory->id]);

            DB::table('post_categories')->where('id', $inoutPostCategory->id)->delete();
        }
    }

    public function down(): void
    {
        // Penggabungan divisi tidak dibalik: Interior & Exterior memang bagian dari ME.
    }
};
