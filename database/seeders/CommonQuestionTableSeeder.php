<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommonQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CommonQuestion::create([
            'question_ar'       => 'كيف اجل في الموقع',
            'question_en'       => 'How do I get to the site?',
            'answer_ar'         => '<p>بعد الدخول على موقع Sudanfarms.com إضغط على خيار التسجيل في أعلي الصفحه</p>
                                <p>ادخل الاسم رباعي</p>
                                <p>إسم المستخدم : هو الاسم الذي سيتم به الدخول إلى الموقع مع كلمة المرور</p>
                                <p>البريد الالكتروني : ×××.××××@××××</p>
                                <p>كلمة المرور : *****</p>
                                <p>تأكيد كلمة المرور : ******</p>
                                <p>ثم إضغط على إنشاء حساب</p>',
            'answer_en'         => '<p>After entering Sudanfarms.com, click on the registration option at the top of the page</p>
                                <p>Enter a quad name</p>
                                <p>Username: is the name with which you will enter the site with the password</p>
                                <p>E-mail: ×××.××××@××××</p>
                                <p>Password: *****</p>
                                <p>Confirm Password: ******</p>
                                <p>Then click on Create Account</p>',
        ]);

        \App\Models\CommonQuestion::create([
            'question_ar'       => 'كيف اعرض منتجاتي علي الموقع',
            'question_en'       => 'How do I display my products on the site?',
            'answer_ar'         => '<p>** بعد عملية التسجيل وتفعيل الحساب قم بالدخول الي حسابك بادخال اسم المستخدم وكلمة المرور</p>
                                <p>** إذا اردت أن تعرض منتجاتك علي موقع sudanfarms.com يجب عليك ترقية حسابك لتصبح تاجر
                                    وذلك بالضغط علي ترقية وبعد ذلك ادخال جميع البيانات المطلوبه ورفع شعار للشركة او صوره والمتابعه
                                    ستفتح معك صفحه إعداد الباقة تضغط علي اختيار ستنقلك الي تأكيد الباقة يجب الضغط علي موافق</p>

                                <p>*** بعد موافقة إدارة الموقع علي طلب الترقية ستظهر ايقونه جديده بها إدارة المنتجات اضغط علي التفاصيل وقم بإضافة منتجاتك واضغط علي حفظ واضف صور للمنتج من إدارة الصور.</p>

                                <p>ملاحظة:اذا لم يتم الاجابة علي استفسارتكم يرجي عدم التردد في الاتصال بنا علي 0963343339</p>',
            'answer_en'         => '<p>** After the registration process and account activation, log into your account by entering your username and password</p>
                                <p>** If you want to display your products on sudanfarms.com, you must upgrade your account to become a merchant
                                    By clicking on “Upgrade” and then entering all the required data, raising the company’s logo or picture and following up
                                    You will open the package setup page, you will click on a selection, it will take you to the package confirmation, you must press OK</p>

                                <p>*** After the site management approves the upgrade request, a new icon will appear with product management, click on the details, add your products and click on save and add product images from the image management.</p>

                                <p>Note: If your query is not answered, please do not hesitate to contact us at 0963343339</p>',
        ]);

    }//end of run

}//end of class
