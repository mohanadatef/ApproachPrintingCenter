<?php
use Illuminate\Support\Facades\DB;
use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permissions=[
            //dashboard
            [
                'name'=>'dashboard-show',
                'display_name'=>'dashboard show',
                'description'=>'show dashboard',
            ],
            //user
            [
                'name'=>'user-list',
                'display_name'=>'user list',
                'description'=>'list user',
            ],
            [
                'name'=>'user-show',
                'display_name'=>'show user',
                'description'=>'show data in user',
            ],
            [
                'name'=>'user-create',
                'display_name'=>'create user',
                'description'=>'create data in user',
            ],
            [
                'name'=>'user-edit',
                'display_name'=>'edit user',
                'description'=>'edit data in user',
            ],
            [
                'name'=>'user-password',
                'display_name'=>'password user',
                'description'=>'password data in user',
            ],
            [
                'name'=>'user-statues',
                'display_name'=>'statues user',
                'description'=>'statues data in user',
            ],
            [
                'name'=>'user-role',
                'display_name'=>'role user',
                'description'=>'role data in user',
            ],
            [
                'name'=>'user-code',
                'display_name'=>'code user',
                'description'=>'code data in user',
            ],
            [
                'name'=>'user-transaction',
                'display_name'=>'code transaction',
                'description'=>'user data in transaction',
            ],
            //role
            [
                'name'=>'role-show',
                'display_name'=>'show role',
                'description'=>'show data in role',
            ],
            [
                'name'=>'role-create',
                'display_name'=>'create role',
                'description'=>'create data in role',
            ],
            [
                'name'=>'role-edit',
                'display_name'=>'edit role',
                'description'=>'edit data in role',
            ],
            //permission
            [
                'name'=>'permission-show',
                'display_name'=>'permission show',
                'description'=>'show permission',
            ],
            [
                'name'=>'permission-edit',
                'display_name'=>'edit permission',
                'description'=>'edit data in permission',
            ],
            //log
            [
                'name'=>'log-show',
                'display_name'=>'log show',
                'description'=>'show log',
            ],
            //customer
            [
                'name'=>'customer-list',
                'display_name'=>'customer list',
                'description'=>'list customer',
            ],
            [
                'name'=>'customer-show',
                'display_name'=>'customer show',
                'description'=>'show customer',
            ],
            [
                'name'=>'customer-create',
                'display_name'=>'create customer',
                'description'=>'create data in customer',
            ],
            [
                'name'=>'customer-edit',
                'display_name'=>'edit customer',
                'description'=>'edit data in customer',
            ],
            [
                'name'=>'customer-wallet',
                'display_name'=>'customer wallet',
                'description'=>'wallet customer',
            ],
            [
                'name'=>'customer-status',
                'display_name'=>'status customer',
                'description'=>'status data in customer',
            ],
            [
                'name'=>'order-start-customer',
                'display_name'=>'order start customer',
                'description'=>'order start customer',
            ],
            [
                'name'=>'order-information-customer',
                'display_name'=>'order information customer',
                'description'=>'order information customer',
            ],
            [
                'name'=>'order-search-customer-all',
                'display_name'=>'order search customer all',
                'description'=>'order search customer all',
            ],
            //core data list
            [
                'name'=>'core-data-list',
                'display_name'=>'core data list',
                'description'=>'core data list',
            ],
            //size
            [
                'name'=>'size-show',
                'display_name'=>'size show',
                'description'=>'show size',
            ],
            [
                'name'=>'size-create',
                'display_name'=>'create size',
                'description'=>'create data in size',
            ],
            [
                'name'=>'size-edit',
                'display_name'=>'edit size',
                'description'=>'edit data in size',
            ],
            //color
            [
                'name'=>'color-show',
                'display_name'=>'color show',
                'description'=>'show color',
            ],
            [
                'name'=>'color-create',
                'display_name'=>'create color',
                'description'=>'create data in color',
            ],
            [
                'name'=>'color-edit',
                'display_name'=>'edit color',
                'description'=>'edit data in size',
            ],
            //type
            [
                'name'=>'type-show',
                'display_name'=>'type show',
                'description'=>'show type',
            ],
            [
                'name'=>'type-create',
                'display_name'=>'create type',
                'description'=>'create data in type',
            ],
            [
                'name'=>'type-edit',
                'display_name'=>'edit type',
                'description'=>'edit data in type',
            ],
            //machine
            [
                'name'=>'machine-show',
                'display_name'=>'machine show',
                'description'=>'show machine',
            ],
            [
                'name'=>'machine-create',
                'display_name'=>'create machine',
                'description'=>'create data in machine',
            ],
            [
                'name'=>'machine-edit',
                'display_name'=>'edit machine',
                'description'=>'edit data in machine',
            ],
            //store
            [
                'name'=>'store-list',
                'display_name'=>'store list',
                'description'=>'list store',
            ],
            [
                'name'=>'store-show',
                'display_name'=>'store show',
                'description'=>'show store',
            ],
            [
                'name'=>'store-create',
                'display_name'=>'create store',
                'description'=>'create data in store',
            ],
            [
                'name'=>'store-edit',
                'display_name'=>'edit store',
                'description'=>'edit data in store',
            ],
            [
                'name'=>'store-shop',
                'display_name'=>'shop store',
                'description'=>'shop data in store',
            ],
            [
                'name'=>'store-import',
                'display_name'=>'import store',
                'description'=>'import data in store',
            ],
            //store_transaction
            [
                'name'=>'store-transaction-show',
                'display_name'=>'store transaction show',
                'description'=>'show transaction store',
            ],
            [
                'name'=>'store-transaction-enter-show',
                'display_name'=>'store transaction enter show',
                'description'=>'show transaction enter store',
            ],
            [
                'name'=>'store-transaction-directed-show',
                'display_name'=>'store transaction directed show',
                'description'=>'show transaction directed store',
            ],
            //print price
            [
                'name'=>'print-price-show',
                'display_name'=>'print price show',
                'description'=>'show price print',
            ],
            [
                'name'=>'print-price-create',
                'display_name'=>'create print price',
                'description'=>'create data in print price',
            ],
            [
                'name'=>'print-price-edit',
                'display_name'=>'edit print price',
                'description'=>'edit data in print price',
            ],
            [
                'name'=>'print-price-delete',
                'display_name'=>'delete print price',
                'description'=>'delete data in print price',
            ],
            [
                'name'=>'import-price-create',
                'display_name'=>'import price create',
                'description'=>'import data in price create',
            ],
            //order
            [
                'name'=>'order-list',
                'display_name'=>'order list',
                'description'=>'list order',
            ],
            [
                'name'=>'order-finish-index-all',
                'display_name'=>'order finish index all',
                'description'=>'order finish index all',
            ],
            [
                'name'=>'order-finish-index-day',
                'display_name'=>'order finish index day',
                'description'=>'order finish index day',
            ],
            [
                'name'=>'order-work-index',
                'display_name'=>'order work index',
                'description'=>'order work index',
            ],
            [
                'name'=>'order-information',
                'display_name'=>'order information',
                'description'=>'information order',
            ],
            [
                'name'=>'order-start',
                'display_name'=>'order start',
                'description'=>'start order',
            ],
            [
                'name'=>'order-search-customer',
                'display_name'=>'order search customer',
                'description'=>'order search customer',
            ],
            [
                'name'=>'order-buy-type',
                'display_name'=>'order buy type',
                'description'=>'order buy type',
            ],
            [
                'name'=>'order-buy-print',
                'display_name'=>'order buy print',
                'description'=>'order buy print',
            ],
            [
                'name'=>'order-buy-laser',
                'display_name'=>'order buy laser',
                'description'=>'order buy laser',
            ],
            [
                'name'=>'order-add-type-cart',
                'display_name'=>'order add type cart',
                'description'=>'order add type cart',
            ],
            [
                'name'=>'order-add-print-cart',
                'display_name'=>'order add print cart',
                'description'=>'order add print cart',
            ],
            [
                'name'=>'order-add-laser-cart',
                'display_name'=>'order add laser cart',
                'description'=>'order add laser cart',
            ],
            [
                'name'=>'order-cart-type-check',
                'display_name'=>'order cart type check',
                'description'=>'order cart type check',
            ],
            [
                'name'=>'order-cart-print-check',
                'display_name'=>'order cart print check',
                'description'=>'order cart print check',
            ],
            [
                'name'=>'order-cart-laser-check',
                'display_name'=>'order cart laser check',
                'description'=>'order cart laser check',
            ],
            [
                'name'=>'order-cart-type-edit',
                'display_name'=>'order cart type edit',
                'description'=>'order cart type edit',
            ],
            [
                'name'=>'order-cart-print-edit',
                'display_name'=>'order cart print edit',
                'description'=>'order cart print edit',
            ],
            [
                'name'=>'order-cart-laser-edit',
                'display_name'=>'order cart laser edit',
                'description'=>'order cart laser edit',
            ],
            [
                'name'=>'order-cart-type-cansal',
                'display_name'=>'order cart type cansal',
                'description'=>'order cart type cansal',
            ],
            [
                'name'=>'order-cart-print-cansal',
                'display_name'=>'order cart print cansal',
                'description'=>'order cart print cansal',
            ],
            [
                'name'=>'order-cart-laser-cansal',
                'display_name'=>'order cart laser cansal',
                'description'=>'order cart laser cansal',
            ],
            [
                'name'=>'order-cart-file-cansal',
                'display_name'=>'order cart file cansal',
                'description'=>'order cart file cansal',
            ],
            [
                'name'=>'order-finish',
                'display_name'=>'order finish',
                'description'=>'order finish',
            ],
            ///laser list
            [
                'name'=>'laser-list',
                'display_name'=>'laser list',
                'description'=>'laser list',
            ],
            [
                'name'=>'laser-show',
                'display_name'=>'laser show',
                'description'=>'laser show',
            ],
            [
                'name'=>'laser-work',
                'display_name'=>'laser work',
                'description'=>'laser work',
            ],
            [
                'name'=>'laser-information',
                'display_name'=>'laser information',
                'description'=>'laser information',
            ],
            [
                'name'=>'laser-start',
                'display_name'=>'laser start',
                'description'=>'laser start',
            ],
            [
                'name'=>'laser-end',
                'display_name'=>'laser end',
                'description'=>'laser end',
            ],
            [
                'name'=>'laser-skip',
                'display_name'=>'laser skip',
                'description'=>'laser skip',
            ],
            [
                'name'=>'laser-finish',
                'display_name'=>'laser finish',
                'description'=>'laser finish',
            ],
            [
                'name'=>'laser-go-cashier',
                'display_name'=>'laser go cashier',
                'description'=>'laser go cashier',
            ],
            [
                'name'=>'laser-finish-index',
                'display_name'=>'laser finish index',
                'description'=>'laser finish index',
            ],
            [
                'name'=>'laser-finish-index-day',
                'display_name'=>'laser finish index day',
                'description'=>'laser finish index day',
            ],
            [
                'name'=>'laser-finish-problem',
                'display_name'=>'laser finish problem',
                'description'=>'laser finish problem',
            ],
            //chasier list
            [
                'name'=>'chasier-list',
                'display_name'=>'chasier list',
                'description'=>'chasier list',
            ],
            [
                'name'=>'chasier-pay',
                'display_name'=>'chasier pay',
                'description'=>'chasier pay',
            ],
            [
                'name'=>'chasier-end',
                'display_name'=>'chasier end',
                'description'=>'chasier end',
            ],
            [
                'name'=>'chasier-transaction',
                'display_name'=>'chasier transaction',
                'description'=>'chasier transaction',
            ],
            [
                'name'=>'chasier-transaction-show',
                'display_name'=>'chasier transaction show',
                'description'=>'chasier transaction show',
            ],

            //chasier list customer
            [
                'name'=>'chasier-list-customer',
                'display_name'=>'chasier list customer',
                'description'=>'chasier list customer',
            ],
            [
                'name'=>'chasier-start-customer',
                'display_name'=>'chasier start customer',
                'description'=>'chasier start customer',
            ],
            [
                'name'=>'chasier-search-customer',
                'display_name'=>'chasier search customer',
                'description'=>'chasier search customer',
            ],
            [
                'name'=>'chasier-add-money',
                'display_name'=>'chasier add money',
                'description'=>'chasier add money',
            ],
            //chasier list laser
            [
                'name'=>'chasier-list-laser',
                'display_name'=>'chasier list laser',
                'description'=>'chasier list laser',
            ],
            [
                'name'=>'chasier-laser-index',
                'display_name'=>'chasier laser index',
                'description'=>'chasier laser index',
            ],
            [
                'name'=>'chasier-laser-index-pay',
                'display_name'=>'chasier laser index pay',
                'description'=>'chasier laser index pay',
            ],
            [
                'name'=>'chasier-laser-discount',
                'display_name'=>'chasier laser discount',
                'description'=>'chasier laser discount',
            ],
            [
                'name'=>'chasier-laser-discarded',
                'display_name'=>'chasier laser discarded',
                'description'=>'chasier laser discarded',
            ],
            //chasier list print
            [
                'name'=>'chasier-list-print',
                'display_name'=>'chasier list print',
                'description'=>'chasier list print',
            ],
            [
                'name'=>'chasier-print-index',
                'display_name'=>'chasier print index',
                'description'=>'chasier print index',
            ],
            [
                'name'=>'chasier-print-index-pay',
                'display_name'=>'chasier print index pay',
                'description'=>'chasier print index pay',
            ],
            [
                'name'=>'chasier-print-discount',
                'display_name'=>'chasier print discount',
                'description'=>'chasier print discount',
            ],
            [
                'name'=>'chasier-print-discarded',
                'display_name'=>'chasier print discarded',
                'description'=>'chasier print discarded',
            ],
            //chasier list type
            [
                'name'=>'chasier-list-type',
                'display_name'=>'chasier list type',
                'description'=>'chasier list type',
            ],
            [
                'name'=>'chasier-type-index',
                'display_name'=>'chasier type index',
                'description'=>'chasier type index',
            ],
            [
                'name'=>'chasier-type-index-pay',
                'display_name'=>'chasier type index pay',
                'description'=>'chasier type index pay',
            ],
            [
                'name'=>'chasier-type-discount',
                'display_name'=>'chasier type discount',
                'description'=>'chasier type discount',
            ],
            [
                'name'=>'chasier-type-discarded',
                'display_name'=>'chasier type discarded',
                'description'=>'chasier type discarded',
            ],
            ///print list
            [
                'name'=>'print-list',
                'display_name'=>'print list',
                'description'=>'print list',
            ],
            [
                'name'=>'print-show',
                'display_name'=>'print show',
                'description'=>'print show',
            ],
            [
                'name'=>'print-work',
                'display_name'=>'print work',
                'description'=>'print work',
            ],
            [
                'name'=>'print-information',
                'display_name'=>'print information',
                'description'=>'print information',
            ],
            [
                'name'=>'print-all',
                'display_name'=>'print all',
                'description'=>'print all',
            ],
            [
                'name'=>'print-end',
                'display_name'=>'print end',
                'description'=>'print end',
            ],
            [
                'name'=>'print-start',
                'display_name'=>'print start',
                'description'=>'print start',
            ],
            [
                'name'=>'print-skip',
                'display_name'=>'print skip',
                'description'=>'print skip',
            ],
            [
                'name'=>'print-finish-index-all',
                'display_name'=>'print finish index all',
                'description'=>'print finish index all',
            ],
            [
                'name'=>'print-finish-index-all-day',
                'display_name'=>'print finish index all day',
                'description'=>'print finish index all day',
            ],
            [
                'name'=>'print-finish-index',
                'display_name'=>'print finish index',
                'description'=>'print finish index',
            ],
            [
                'name'=>'print-finish-index-day',
                'display_name'=>'print finish index day',
                'description'=>'print finish index day',
            ],
            ///type list
            [
                'name'=>'type-list',
                'display_name'=>'type list',
                'description'=>'type list',
            ],
            [
                'name'=>'type-finish-index',
                'display_name'=>'type finish index',
                'description'=>'type finish index',
            ],
            [
                'name'=>'type-finish-index-day',
                'display_name'=>'type finish index day',
                'description'=>'type finish index day',
            ],
            //import customer
            [
                'name'=>'import-customer-create',
                'display_name'=>'import customer create',
                'description'=>'import data in customer create',
            ],
            //wallet system
            [
                'name'=>'wallet-system',
                'display_name'=>'wallet system',
                'description'=>'all wallet in system',
            ],
            [
                'name'=>'chasier-wallet-customer',
                'display_name'=>'chasier wallet customer',
                'description'=>'all wallet in system for customer',
            ],
            [
                'name'=>'chasier-search-customer-wallet',
                'display_name'=>'chasier wallet customer',
                'description'=>'all wallet in system for customer',
            ],
        ];
        foreach ($permissions as $key=>$value)
        {
            Permission::create($value);
        }
    }
}
