<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PolicyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Policy::create([
            'title_ar' => 'إشعار حقوق الطبع',
            'title_en' => 'Copyright Notice',
            'body_ar'  => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            'body_en'  => 'This non-real text is an alternative to other text This text will be replaced by real text when the content of the site False Text Substitute for other text It will be replaced by real text when the sites content is changed',
            'guard'    => 'copyrights',
        ]);

        \App\Models\Policy::create([
            'title_ar' => 'الروابط',
            'title_en' => 'links',
            'body_ar'  => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            'body_en'  => 'This non-real text is an alternative to other text This text will be replaced by real text when the content of the site False Text Substitute for other text It will be replaced by real text when the sites content is changed',
            'guard'    => 'copyrights',
        ]);

        \App\Models\Policy::create([
            'title_ar' => 'حقوق الملكية الفكرية',
            'title_en' => 'intellectual property rights',
            'body_ar'  => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            'body_en'  => 'This non-real text is an alternative to other text This text will be replaced by real text when the content of the site False Text Substitute for other text It will be replaced by real text when the sites content is changed',
            'guard'    => 'copyrights',
        ]);


        ################################################################################################
        ###################################  Copyrights ################################################
        ################################################################################################

        \App\Models\Policy::create([
            'title_ar' => 'إستخدام المعلومات والمواد',
            'title_en' => 'Use of information and materials',
            'body_ar'  => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            'body_en'  => 'This non-real text is an alternative to other text This text will be replaced by real text when the content of the site False Text Substitute for other text It will be replaced by real text when the sites content is changed',
            'guard'    => 'privacys',
        ]);

        \App\Models\Policy::create([
            'title_ar' => 'إعفاء من المسؤولية',
            'title_en' => 'DISCLAIMER OF LIABILITY',
            'body_ar'  => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            'body_en'  => 'This non-real text is an alternative to other text This text will be replaced by real text when the content of the site False Text Substitute for other text It will be replaced by real text when the sites content is changed',
            'guard'    => 'privacys',
        ]);

        \App\Models\Policy::create([
            'title_ar' => 'قيود على الاستخدام',
            'title_en' => 'Restrictions on use',
            'body_ar'  => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            'body_en'  => 'This non-real text is an alternative to other text This text will be replaced by real text when the content of the site False Text Substitute for other text It will be replaced by real text when the sites content is changed',
            'guard'    => 'privacys',
        ]);

        \App\Models\Policy::create([
            'title_ar' => 'تقديم المعلومات',
            'title_en' => 'provide information',
            'body_ar'  => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            'body_en'  => 'This non-real text is an alternative to other text This text will be replaced by real text when the content of the site False Text Substitute for other text It will be replaced by real text when the sites content is changed',
            'guard'    => 'privacys',
        ]);


        ################################################################################################
        ###################################  privacy ###################################################
        ################################################################################################

        \App\Models\Policy::create([
            'title_ar' => 'إخلاء المسؤولية القانونية',
            'title_en' => 'Legal Disclaimer',
            'body_ar'  => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            'body_en'  => 'This non-real text is an alternative to other text This text will be replaced by real text when the content of the site False Text Substitute for other text It will be replaced by real text when the sites content is changed',
            'guard'    => 'terms-conditions',
        ]);

        \App\Models\Policy::create([
            'title_ar' => 'عدم التنازل',
            'title_en' => 'non-compromise',
            'body_ar'  => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            'body_en'  => 'This non-real text is an alternative to other text This text will be replaced by real text when the content of the site False Text Substitute for other text It will be replaced by real text when the sites content is changed',
            'guard'    => 'terms_conditions',
        ]);

        \App\Models\Policy::create([
            'title_ar' => 'قابلية الفصل',
            'title_en' => 'Separability',
            'body_ar'  => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            'body_en'  => 'This non-real text is an alternative to other text This text will be replaced by real text when the content of the site False Text Substitute for other text It will be replaced by real text when the sites content is changed',
            'guard'    => 'terms_conditions',
        ]);

        \App\Models\Policy::create([
            'title_ar' => 'ضمان التعويض',
            'title_en' => 'compensation guarantee',
            'body_ar'  => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            'body_en'  => 'This non-real text is an alternative to other text This text will be replaced by real text when the content of the site False Text Substitute for other text It will be replaced by real text when the sites content is changed',
            'guard'    => 'terms_conditions',
        ]);

        \App\Models\Policy::create([
            'title_ar' => 'القانون الساري والسلطة القضائيّة المختصّة',
            'title_en' => 'Applicable Law and Competent Judicial Authority',
            'body_ar'  => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            'body_en'  => 'This non-real text is an alternative to other text This text will be replaced by real text when the content of the site False Text Substitute for other text It will be replaced by real text when the sites content is changed',
            'guard'    => 'terms_conditions',
        ]);

        ################################################################################################
        ###################################  terms-conditions ##########################################
        ################################################################################################

        \App\Models\Policy::create([
            'title_ar' => 'اشعار اخلاء المسؤولية',
            'title_en' => 'Disclaimer Notice',
            'body_ar'  => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            'body_en'  => 'This non-real text is an alternative to other text This text will be replaced by real text when the content of the site False Text Substitute for other text It will be replaced by real text when the sites content is changed',
            'guard'    => 'evacuation_responsibilatys',
        ]);

        \App\Models\Policy::create([
            'title_ar' => 'اخلاء مسؤولية الروابط التشعيبية الخارجية',
            'title_en' => 'External hyperlink disclaimer',
            'body_ar'  => 'هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع هذا النص غير حقيقي بديل ل نص آخر سيتم إستبداله بنص حقيقي عند تغيير محتوى الموقع.',
            'body_en'  => 'This non-real text is an alternative to other text This text will be replaced by real text when the content of the site False Text Substitute for other text It will be replaced by real text when the sites content is changed',
            'guard'    => 'evacuation_responsibilatys',
        ]);

        ################################################################################################
        ###################################  evacuation-responsibilaty #################################
        ################################################################################################
        
    }//end of run

}//end of class
