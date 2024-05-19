<?php

namespace Database\Seeders\ACL;

use App\Models\ACL\Permission;
use App\Models\ACL\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->UserPermissions();
        $this->BrandPermissions();
        $this->CategoryPermissions();
        $this->GalleryPermissions();
        $this->ProductPermissions();
        $this->PermissionPermissions();
        $this->RolePermissions();
        $this->CommentPermissions();
        $this->OrderPermissions();
        $this->TransportationPermissions();
        $this->PaymentPermissions();
        $this->FileManagerPermissions();
        $this->PaymentHistory();
        $this->DiscountPermissions();


        Permission::query()->create([
            'name'=> 'staff-user-permission',
            'title' => 'مدیریت دسترسی کاربران مدیر'
        ]);
        Permission::query()->create([
            'name'=> 'show-staff-users',
            'title' => 'مشاهده کاربران مدیر'
        ]);

        Role::query()->create([
            'name' => 'ManageUser',
            'title' => 'مدیریت کاربران'
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '1',
            'role_id' => '1'
        ]);
        DB::table('permission_role')->insert([
            'permission_id' => '2',
            'role_id' => '1'
        ]);

        DB::table('role_user')->insert([
            'user_id' => '1',
            'role_id' => '1',
        ]);
        DB::table('role_user')->insert([
            'user_id' => '2',
            'role_id' => '1',
        ]);

        DB::table('permission_user')->insert([
            'permission_id' =>'1',
            'user_id'=> '1'
        ]);
        DB::table('permission_user')->insert([
            'permission_id' =>'1',
            'user_id'=> '2'
        ]);

    }
    private function UserPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-user',
            'title' => 'ایجاد کاربر'
        ]);
        Permission::query()->create([
            'name'=> 'show-users',
            'title' => 'مشاهده کاربران'
        ]);
        Permission::query()->create([
            'name'=> 'edit-user',
            'title' => 'ویرایش کاربر'
        ]);
        Permission::query()->create([
            'name'=> 'delete-user',
            'title' => 'حذف کاربر'
        ]);
    }

    private function BrandPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-brand',
            'title' => 'ایجاد برند'
        ]);
        Permission::query()->create([
            'name'=> 'show-brands',
            'title' => 'مشاهده برندها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-brand',
            'title' => 'ویرایش برند'
        ]);
        Permission::query()->create([
            'name'=> 'delete-brand',
            'title' => 'حذف برند'
        ]);
    }

    private function CategoryPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-category',
            'title' => 'ایجاد دسته بندی'
        ]);
        Permission::query()->create([
            'name'=> 'show-categories',
            'title' => 'مشاهده دسته بندی ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-category',
            'title' => 'ویرایش دسته بندی'
        ]);
        Permission::query()->create([
            'name'=> 'delete-category',
            'title' => 'حذف دسته بندی'
        ]);
    }

    private function GalleryPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-gallery',
            'title' => 'ایجاد رسانه'
        ]);
        Permission::query()->create([
            'name'=> 'show-galleries',
            'title' => 'مشاهده رسانه ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-gallery',
            'title' => 'ویرایش رسانه'
        ]);
        Permission::query()->create([
            'name'=> 'delete-gallery',
            'title' => 'حذف رسانه'
        ]);
    }

    private function ProductPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-product',
            'title' => 'ایجاد محصول'
        ]);
        Permission::query()->create([
            'name'=> 'show-products',
            'title' => 'مشاهده محصولات'
        ]);
        Permission::query()->create([
            'name'=> 'edit-product',
            'title' => 'ویرایش محصول'
        ]);
        Permission::query()->create([
            'name'=> 'delete-product',
            'title' => 'حذف محصول'
        ]);
    }

    private function CommentPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-comment',
            'title' => 'ایجاد نظر'
        ]);
        Permission::query()->create([
            'name'=> 'show-comments',
            'title' => 'مشاهده نظرات'
        ]);
        Permission::query()->create([
            'name'=> 'edit-comment',
            'title' => 'ویرایش نظر'
        ]);
        Permission::query()->create([
            'name'=> 'delete-comment',
            'title' => 'حذف نظر'
        ]);
    }

    private function PermissionPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-permission',
            'title' => 'ایجاد دسترسی'
        ]);
        Permission::query()->create([
            'name'=> 'show-permissions',
            'title' => ' مشاهده دسترسی ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-permission',
            'title' => 'ویرایش دسترسی'
        ]);
        Permission::query()->create([
            'name'=> 'delete-permission',
            'title' => 'حذف دسترسی'
        ]);
    }

    private function RolePermissions()
    {
        Permission::query()->create([
            'name'=> 'create-role',
            'title' => 'ایجاد مقام'
        ]);
        Permission::query()->create([
            'name'=> 'show-roles',
            'title' => ' مشاهده مقام ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-role',
            'title' => 'ویرایش مقام'
        ]);
        Permission::query()->create([
            'name'=> 'delete-role',
            'title' => 'حذف مقام'
        ]);
    }
    private function OrderPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-order',
            'title' => 'ایجاد سفارش'
        ]);
        Permission::query()->create([
            'name'=> 'show-orders',
            'title' => 'مشاهده سفارشات'
        ]);
        Permission::query()->create([
            'name'=> 'edit-order',
            'title' => 'ویرایش سفارش'
        ]);
        Permission::query()->create([
            'name'=> 'delete-order',
            'title' => 'حذف سفارش'
        ]);


    }
    private function TransportationPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-transportation',
            'title' => 'ایجاد حمل نقل'
        ]);
        Permission::query()->create([
            'name'=> 'show-transportations',
            'title' => 'مشاهده حمل نقل ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-transportation',
            'title' => 'ویرایش حمل نقل'
        ]);
        Permission::query()->create([
            'name'=> 'delete-transportation',
            'title' => 'حذف حمل نقل'
        ]);
    }

    private function PaymentPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-payment',
            'title' => 'ایجاد درگاه پرداخت'
        ]);
        Permission::query()->create([
            'name'=> 'show-payments',
            'title' => 'مشاهده درگاه پرداخت ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-payment',
            'title' => 'ویرایش درگاه پرداخت'
        ]);
        Permission::query()->create([
            'name'=> 'delete-payment',
            'title' => 'حذف درگاه پرداخت'
        ]);
    }

    private function DiscountPermissions()
    {
        Permission::query()->create([
            'name'=> 'create-discount',
            'title' => 'ایجاد تخفیف'
        ]);
        Permission::query()->create([
            'name'=> 'show-discounts',
            'title' => 'مشاهده تخفیف ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-discount',
            'title' => 'ویرایش تخفیف'
        ]);
        Permission::query()->create([
            'name'=> 'delete-discount',
            'title' => 'حذف تخفیف'
        ]);
    }

    private function PaymentHistory()
    {
        Permission::query()->create([
            'name'=> 'create-paymentHistory',
            'title' => 'ایجاد گزارش پرداخت'
        ]);
        Permission::query()->create([
            'name'=> 'show-paymentHistories',
            'title' => 'مشاهده گزارش پرداخت ها'
        ]);
        Permission::query()->create([
            'name'=> 'edit-paymentHistory',
            'title' => 'ویرایش گزارش پرداخت'
        ]);
        Permission::query()->create([
            'name'=> 'delete-paymentHistory',
            'title' => 'حذف گزارش پرداخت'
        ]);
    }


    private function FileManagerPermissions()
    {
        Permission::query()->create([
            'name'=> 'show-fileManager',
            'title' => 'نمایش مدیریت فایل'
        ]);
    }
}
