<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Support\Str;

class SpecialArticlesSeeder extends Seeder
{
    public function run(): void
    {
        // الحصول على الأقسام
        $poemsCategory = Category::where('slug', 'poems')->first();
        $healthCategory = Category::where('slug', 'health')->first();
        $greetingsCategory = Category::where('slug', 'greetings')->first();
        
        // الحصول على مؤلف (أو إنشاء واحد)
        $author = Author::first() ?? Author::create([
            'name' => 'مؤلف الموقع',
            'email' => 'author@shabwah21.com',
            'bio' => 'مؤلف محترف في شبوة21',
            'is_active' => true,
        ]);

        // مقالات القصائد الشعرية
        if ($poemsCategory) {
            $poems = [
                [
                    'title' => 'قصيدة في حب الوطن',
                    'excerpt' => 'قصيدة رائعة تعبر عن حب الوطن والانتماء له، كتبها شاعر محلي من شبوة.',
                    'content' => 'في كل شبر من ترابك يا وطني... حكاية وأمل وذكريات جميلة. هنا نشأت وهنا سأبقى، وفي ترابك سأدفن يوماً ما. يا وطني يا شبوة الحبيبة، أنت الأمل وأنت المستقبل.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'أغنية للربيع',
                    'excerpt' => 'قصيدة جميلة تصف جمال الربيع في شبوة وألوانه المبهجة.',
                    'content' => 'جاء الربيع بألوانه الزاهية، وملأ الدنيا بالخضرة والبهجة. في شبوة الجميلة، الربيع له طعم خاص ورائحة مميزة. يا ربيع، كم أنت جميل!',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => false,
                ],
                [
                    'title' => 'قصيدة الأم',
                    'excerpt' => 'قصيدة مؤثرة في حب الأم وتضحياتها، من أجمل ما كتب في هذا المجال.',
                    'content' => 'أمي يا نور حياتي، يا من ضحت من أجلي بكل شيء. في عينيك أرى الحب والحنان، وفي ابتسامتك أجد السعادة والأمان. شكراً لك يا أمي.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'أغنية المساء',
                    'excerpt' => 'قصيدة رومانسية تصف جمال المساء في شبوة وهدوئه الساحر.',
                    'content' => 'عندما يحل المساء، وتغرب الشمس خلف الجبال، يبدأ السكون يخيم على شبوة الجميلة. في هذا الوقت، تشعر بالهدوء والسلام.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => false,
                ],
                [
                    'title' => 'قصيدة الصداقة',
                    'excerpt' => 'قصيدة جميلة في الصداقة الحقيقية وقيمتها في حياتنا.',
                    'content' => 'الصداقة نعمة من الله، وهدية ثمينة لا تقدر بثمن. الصديق الحقيقي هو من يقف معك في السراء والضراء، ويشاركك أفراحك وأحزانك.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => false,
                ],
                [
                    'title' => 'أغنية الحنين',
                    'excerpt' => 'قصيدة مؤثرة في الحنين للوطن والأهل والأصدقاء.',
                    'content' => 'الحنين شعور جميل، يجعلنا نتذكر الأماكن والأشخاص الذين نحبهم. في كل مرة أشعر بالحنين، أتذكر شبوة وأهلها الطيبين.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => true,
                ],
            ];

            foreach ($poems as $poem) {
                Article::create([
                    'title' => $poem['title'],
                    'slug' => Str::slug($poem['title']),
                    'excerpt' => $poem['excerpt'],
                    'content' => $poem['content'],
                    'category_id' => $poemsCategory->id,
                    'author_id' => $author->id,
                    'type' => $poem['type'],
                    'is_published' => $poem['is_published'],
                    'is_featured' => $poem['is_featured'],
                    'published_at' => now(),
                ]);
            }
        }

        // مقالات الطب والصحة
        if ($healthCategory) {
            $healthArticles = [
                [
                    'title' => 'نصائح للحفاظ على صحة القلب',
                    'excerpt' => 'مقال طبي شامل عن كيفية الحفاظ على صحة القلب من خلال التغذية السليمة والرياضة.',
                    'content' => 'صحة القلب من أهم الأمور التي يجب أن نهتم بها. من خلال التغذية السليمة والرياضة المنتظمة، يمكننا الحفاظ على قلب سليم وقوي. تناول الخضروات والفواكه الطازجة، وتجنب الدهون المشبعة، وممارسة الرياضة بانتظام هي أساس صحة القلب.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'فوائد شرب الماء للجسم',
                    'excerpt' => 'تعرف على الفوائد العديدة لشرب الماء بكميات كافية يومياً.',
                    'content' => 'الماء هو أساس الحياة، وشرب كميات كافية منه يومياً له فوائد عديدة للجسم. يساعد في تنظيم درجة حرارة الجسم، وطرد السموم، وتحسين عملية الهضم، والحفاظ على نضارة البشرة. ينصح بشرب 8 أكواب من الماء يومياً على الأقل.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => false,
                ],
                [
                    'title' => 'كيفية الوقاية من نزلات البرد',
                    'excerpt' => 'نصائح طبية مهمة للوقاية من نزلات البرد خاصة في فصل الشتاء.',
                    'content' => 'نزلات البرد من أكثر الأمراض شيوعاً، خاصة في فصل الشتاء. للوقاية منها، يجب الحفاظ على النظافة الشخصية، وتناول الأطعمة الغنية بفيتامين C، والحصول على قسط كافٍ من النوم، وتجنب التعرض للبرد الشديد.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'أهمية النوم الصحي',
                    'excerpt' => 'مقال طبي عن أهمية النوم الصحي لجسم الإنسان وعقله.',
                    'content' => 'النوم الصحي ضروري لصحة الجسم والعقل. خلال النوم، يقوم الجسم بإصلاح الخلايا وإنتاج الهرمونات المهمة. النوم لمدة 7-8 ساعات يومياً يساعد في تحسين الذاكرة، وتقوية جهاز المناعة، والحفاظ على صحة القلب.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => false,
                ],
            ];

            foreach ($healthArticles as $article) {
                Article::create([
                    'title' => $article['title'],
                    'slug' => Str::slug($article['title']),
                    'excerpt' => $article['excerpt'],
                    'content' => $article['content'],
                    'category_id' => $healthCategory->id,
                    'author_id' => $author->id,
                    'type' => $article['type'],
                    'is_published' => $article['is_published'],
                    'is_featured' => $article['is_featured'],
                    'published_at' => now(),
                ]);
            }
        }

        // رسائل التهاني والتعازي
        if ($greetingsCategory) {
            $greetings = [
                [
                    'title' => 'تهانينا بمناسبة العيد',
                    'excerpt' => 'رسالة تهاني جميلة بمناسبة عيد الفطر المبارك، نتمنى لكم عيداً سعيداً.',
                    'content' => 'تهانينا بمناسبة عيد الفطر المبارك. نتمنى لكم ولعائلاتكم الكريمة عيداً سعيداً مليئاً بالفرح والسعادة. تقبل الله منا ومنكم صالح الأعمال، وكل عام وأنتم بخير.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'تهانينا بمناسبة الزواج',
                    'excerpt' => 'رسالة تهاني بمناسبة الزواج، نتمنى للعروسين حياة سعيدة مليئة بالحب والتفاهم.',
                    'content' => 'تهانينا بمناسبة زواجكم المبارك. نتمنى لكم حياة سعيدة مليئة بالحب والتفاهم والاحترام المتبادل. أسأل الله أن يبارك في زواجكم ويجعل حياتكم مليئة بالسعادة والهناء.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => false,
                ],
                [
                    'title' => 'رسالة تعزية',
                    'excerpt' => 'رسالة تعزية مؤثرة لمن فقد عزيزاً، نشارككم الحزن ونصلي معكم.',
                    'content' => 'إنا لله وإنا إليه راجعون. نتقدم بخالص التعازي والمواساة لكم في وفاة عزيزكم. نسأل الله أن يتغمده برحمته ويسكنه فسيح جناته، وأن يلهمكم الصبر والسلوان.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => true,
                ],
                [
                    'title' => 'تهانينا بمناسبة التخرج',
                    'excerpt' => 'رسالة تهاني بمناسبة التخرج، نتمنى للخريجين مستقبلاً مشرقاً.',
                    'content' => 'تهانينا بمناسبة تخرجكم. هذا إنجاز عظيم يستحق الاحتفال. نتمنى لكم مستقبلاً مشرقاً مليئاً بالنجاح والتقدم. استمروا في التعلم والتطور، وكونوا فخراً لأسركم ووطنكم.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => false,
                ],
                [
                    'title' => 'تهانينا بمناسبة المولود الجديد',
                    'excerpt' => 'رسالة تهاني بمناسبة ولادة طفل جديد، نتمنى له حياة سعيدة وصحية.',
                    'content' => 'تهانينا بمناسبة ولادة طفلكم الجميل. هذا هدية من الله تستحق الاحتفال. نتمنى للطفل حياة سعيدة وصحية، وأن يكبر في بيئة محبة ومهتمة. مبروك لكم هذا الإنجاز العظيم.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => false,
                ],
                [
                    'title' => 'رسالة شكر',
                    'excerpt' => 'رسالة شكر مؤثرة لمن قدم لنا يد العون والمساعدة.',
                    'content' => 'كلمات الشكر لا تكفي للتعبير عن مدى امتناننا لكم. شكراً لكم على كل ما قدمتموه من عون ومساعدة. لقد كان لكم دور كبير في نجاحنا، وسنظل نتذكر فضلكم دائماً.',
                    'type' => 'article',
                    'is_published' => true,
                    'is_featured' => true,
                ],
            ];

            foreach ($greetings as $greeting) {
                Article::create([
                    'title' => $greeting['title'],
                    'slug' => Str::slug($greeting['title']),
                    'excerpt' => $greeting['excerpt'],
                    'content' => $greeting['content'],
                    'category_id' => $greetingsCategory->id,
                    'author_id' => $author->id,
                    'type' => $greeting['type'],
                    'is_published' => $greeting['is_published'],
                    'is_featured' => $greeting['is_featured'],
                    'published_at' => now(),
                ]);
            }
        }

        // مقالات الانفوجرافيك
        $infographics = [
            [
                'title' => 'إحصائيات السياحة في شبوة 2024',
                'excerpt' => 'انفوجرافيك شامل يعرض إحصائيات السياحة في محافظة شبوة لعام 2024.',
                'content' => 'تعتبر محافظة شبوة من أهم الوجهات السياحية في اليمن. هذا الانفوجرافيك يعرض إحصائيات مفصلة عن عدد السياح، أهم المعالم السياحية، والإيرادات السياحية لعام 2024.',
                'type' => 'infographic',
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'معدلات النمو الاقتصادي في اليمن',
                'excerpt' => 'رسوم بيانية توضح معدلات النمو الاقتصادي في اليمن خلال السنوات الأخيرة.',
                'content' => 'يقدم هذا الانفوجرافيك تحليلاً شاملاً لمعدلات النمو الاقتصادي في اليمن، مع التركيز على القطاعات المختلفة والاتجاهات المستقبلية المتوقعة.',
                'type' => 'infographic',
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'إحصائيات التعليم في شبوة',
                'excerpt' => 'انفوجرافيك يعرض إحصائيات التعليم والمدارس في محافظة شبوة.',
                'content' => 'يعرض هذا الانفوجرافيك إحصائيات مفصلة عن التعليم في شبوة، بما في ذلك عدد المدارس، الطلاب، المعلمين، ومعدلات النجاح.',
                'type' => 'infographic',
                'is_published' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'توزيع السكان في محافظات اليمن',
                'excerpt' => 'خريطة تفاعلية تظهر توزيع السكان في مختلف محافظات اليمن.',
                'content' => 'يقدم هذا الانفوجرافيك خريطة تفاعلية تظهر توزيع السكان في مختلف محافظات اليمن، مع إحصائيات مفصلة عن الكثافة السكانية.',
                'type' => 'infographic',
                'is_published' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'إحصائيات الصحة في شبوة',
                'excerpt' => 'انفوجرافيك يعرض إحصائيات القطاع الصحي في محافظة شبوة.',
                'content' => 'يعرض هذا الانفوجرافيك إحصائيات شاملة عن القطاع الصحي في شبوة، بما في ذلك عدد المستشفيات، الأطباء، والمرضى.',
                'type' => 'infographic',
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'مصادر الطاقة في اليمن',
                'excerpt' => 'انفوجرافيك يعرض مصادر الطاقة المختلفة في اليمن ونسب استخدامها.',
                'content' => 'يقدم هذا الانفوجرافيك تحليلاً شاملاً لمصادر الطاقة في اليمن، مع التركيز على النفط والغاز والطاقة المتجددة.',
                'type' => 'infographic',
                'is_published' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($infographics as $infographic) {
            Article::create([
                'title' => $infographic['title'],
                'slug' => Str::slug($infographic['title']),
                'excerpt' => $infographic['excerpt'],
                'content' => $infographic['content'],
                'category_id' => null, // الانفوجرافيك لا يحتاج قسم
                'author_id' => $author->id,
                'type' => $infographic['type'],
                'is_published' => $infographic['is_published'],
                'is_featured' => $infographic['is_featured'],
                'published_at' => now(),
            ]);
        }
    }
} 