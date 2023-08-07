<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'prestadores_de_servicio_create',
            ],
            [
                'id'    => 34,
                'title' => 'prestadores_de_servicio_edit',
            ],
            [
                'id'    => 35,
                'title' => 'prestadores_de_servicio_show',
            ],
            [
                'id'    => 36,
                'title' => 'prestadores_de_servicio_access',
            ],
            [
                'id'    => 37,
                'title' => 'listum_access',
            ],
            [
                'id'    => 38,
                'title' => 'estado_create',
            ],
            [
                'id'    => 39,
                'title' => 'estado_edit',
            ],
            [
                'id'    => 40,
                'title' => 'estado_show',
            ],
            [
                'id'    => 41,
                'title' => 'estado_delete',
            ],
            [
                'id'    => 42,
                'title' => 'estado_access',
            ],
            [
                'id'    => 43,
                'title' => 'municipio_create',
            ],
            [
                'id'    => 44,
                'title' => 'municipio_edit',
            ],
            [
                'id'    => 45,
                'title' => 'municipio_show',
            ],
            [
                'id'    => 46,
                'title' => 'municipio_delete',
            ],
            [
                'id'    => 47,
                'title' => 'municipio_access',
            ],
            [
                'id'    => 48,
                'title' => 'destino_create',
            ],
            [
                'id'    => 49,
                'title' => 'destino_edit',
            ],
            [
                'id'    => 50,
                'title' => 'destino_show',
            ],
            [
                'id'    => 51,
                'title' => 'destino_delete',
            ],
            [
                'id'    => 52,
                'title' => 'destino_access',
            ],
            [
                'id'    => 53,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 54,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 55,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 56,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 57,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 58,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 59,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 60,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 61,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 62,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 63,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 64,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 65,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 66,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 67,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 68,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 69,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 70,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 71,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 72,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 73,
                'title' => 'cliente_create',
            ],
            [
                'id'    => 74,
                'title' => 'cliente_edit',
            ],
            [
                'id'    => 75,
                'title' => 'cliente_show',
            ],
            [
                'id'    => 76,
                'title' => 'cliente_delete',
            ],
            [
                'id'    => 77,
                'title' => 'cliente_access',
            ],
            [
                'id'    => 78,
                'title' => 'idioma_create',
            ],
            [
                'id'    => 79,
                'title' => 'idioma_edit',
            ],
            [
                'id'    => 80,
                'title' => 'idioma_show',
            ],
            [
                'id'    => 81,
                'title' => 'idioma_delete',
            ],
            [
                'id'    => 82,
                'title' => 'idioma_access',
            ],
            [
                'id'    => 83,
                'title' => 'divisa_create',
            ],
            [
                'id'    => 84,
                'title' => 'divisa_edit',
            ],
            [
                'id'    => 85,
                'title' => 'divisa_show',
            ],
            [
                'id'    => 86,
                'title' => 'divisa_delete',
            ],
            [
                'id'    => 87,
                'title' => 'divisa_access',
            ],
            [
                'id'    => 88,
                'title' => 'estatus_reserva_create',
            ],
            [
                'id'    => 89,
                'title' => 'estatus_reserva_edit',
            ],
            [
                'id'    => 90,
                'title' => 'estatus_reserva_show',
            ],
            [
                'id'    => 91,
                'title' => 'estatus_reserva_delete',
            ],
            [
                'id'    => 92,
                'title' => 'estatus_reserva_access',
            ],
            [
                'id'    => 93,
                'title' => 'estatus_pago_create',
            ],
            [
                'id'    => 94,
                'title' => 'estatus_pago_edit',
            ],
            [
                'id'    => 95,
                'title' => 'estatus_pago_show',
            ],
            [
                'id'    => 96,
                'title' => 'estatus_pago_delete',
            ],
            [
                'id'    => 97,
                'title' => 'estatus_pago_access',
            ],
            [
                'id'    => 98,
                'title' => 'reserva_create',
            ],
            [
                'id'    => 99,
                'title' => 'reserva_edit',
            ],
            [
                'id'    => 100,
                'title' => 'reserva_show',
            ],
            [
                'id'    => 101,
                'title' => 'reserva_delete',
            ],
            [
                'id'    => 102,
                'title' => 'reserva_access',
            ],
            [
                'id'    => 103,
                'title' => 'detalle_de_reserva_create',
            ],
            [
                'id'    => 104,
                'title' => 'detalle_de_reserva_edit',
            ],
            [
                'id'    => 105,
                'title' => 'detalle_de_reserva_show',
            ],
            [
                'id'    => 106,
                'title' => 'detalle_de_reserva_delete',
            ],
            [
                'id'    => 107,
                'title' => 'detalle_de_reserva_access',
            ],
            [
                'id'    => 108,
                'title' => 'pago_create',
            ],
            [
                'id'    => 109,
                'title' => 'pago_edit',
            ],
            [
                'id'    => 110,
                'title' => 'pago_show',
            ],
            [
                'id'    => 111,
                'title' => 'pago_delete',
            ],
            [
                'id'    => 112,
                'title' => 'pago_access',
            ],
            [
                'id'    => 113,
                'title' => 'administrar_reserva_access',
            ],
            [
                'id'    => 114,
                'title' => 'enlace_create',
            ],
            [
                'id'    => 115,
                'title' => 'enlace_edit',
            ],
            [
                'id'    => 116,
                'title' => 'enlace_show',
            ],
            [
                'id'    => 117,
                'title' => 'enlace_delete',
            ],
            [
                'id'    => 118,
                'title' => 'enlace_access',
            ],
            [
                'id'    => 119,
                'title' => 'configuracion_general_access',
            ],
            [
                'id'    => 120,
                'title' => 'bloques_pagina_create',
            ],
            [
                'id'    => 121,
                'title' => 'bloques_pagina_edit',
            ],
            [
                'id'    => 122,
                'title' => 'bloques_pagina_show',
            ],
            [
                'id'    => 123,
                'title' => 'bloques_pagina_delete',
            ],
            [
                'id'    => 124,
                'title' => 'bloques_pagina_access',
            ],
            [
                'id'    => 125,
                'title' => 'admin_config_create',
            ],
            [
                'id'    => 126,
                'title' => 'admin_config_edit',
            ],
            [
                'id'    => 127,
                'title' => 'admin_config_show',
            ],
            [
                'id'    => 128,
                'title' => 'admin_config_delete',
            ],
            [
                'id'    => 129,
                'title' => 'admin_config_access',
            ],
            [
                'id'    => 130,
                'title' => 'banner_create',
            ],
            [
                'id'    => 131,
                'title' => 'banner_edit',
            ],
            [
                'id'    => 132,
                'title' => 'banner_show',
            ],
            [
                'id'    => 133,
                'title' => 'banner_delete',
            ],
            [
                'id'    => 134,
                'title' => 'banner_access',
            ],
            [
                'id'    => 135,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
