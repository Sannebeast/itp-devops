<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    private $data = [
        [
            'title' => 'Programming Tips for Beginners',
            'excerpt' => 'Learn how to <strong>get started</strong> with programming.',
            'body' => '<p>Programming is a valuable skill that can open up many opportunities. Whether you want to build <strong>software</strong>, develop websites, or work on <strong>data analysis</strong>, programming is a versatile tool.</p>
     <p>For beginners, it can be a bit overwhelming, but with the right guidance, you can quickly grasp the <strong>basics</strong>. Start with a simple language like <strong>Python</strong> and work on small projects to build your skills.</p>
     <p>As you progress, you can explore more advanced topics like <strong>algorithms</strong>, <strong>data structures</strong>, and software <strong>design</strong>. The journey of programming is both challenging and rewarding.</p>',
            'comments' => [
                "I tried programming once. Now my cat sits on my keyboard and pretends to be debugging.",
                "Programming is like cooking. Even if you follow the recipe perfectly, there's always a chance you'll end up with a mess.",
                "Programming tip for beginners: Treat your code like your own child. Love it, nurture it, and occasionally yell at it when it misbehaves.",
                "My programming skills are like a rollercoaster. Lots of ups and downs, and occasionally someone screams.",
                "Programming is like magic, but instead of waving a wand, you're waving a keyboard and hoping for the best.",
                "Programming is the art of telling a computer what to do, and then spending hours trying to figure out why it won't do it.",
                "You know you're a programmer when you spend more time talking to your computer than you do to actual people.",
                "Programming is easy, it's the bugs that are hard to tame. Like trying to catch a greased pig in a room full of banana peels.",
                "The best thing about programming is that you get to turn coffee into code. The worst thing is when the code refuses to compile until you've had your third cup."
            ]
        ],
        [
            'title' => 'The Cuteness of Guinea Pigs',
            'excerpt' => 'Discover the adorable world of <strong>guinea pigs</strong>.',
            'body' => '<p><strong>Guinea pigs</strong> are small, furry, and incredibly charming pets. Their gentle nature and cute appearance make them popular among animal lovers.</p>
     <p>These rodents are native to South America and have been domesticated for centuries. <strong>Guinea pigs</strong> make excellent companions due to their social behavior and friendly demeanor.</p>
     <p>In this post, we will explore the world of <strong>guinea pigs</strong>, from their history to care tips and fun facts about these lovable creatures.</p>',
            'comments' => [
                "Guinea pigs are like tiny, fluffy potatoes with legs. They're just too adorable to resist!",
                "Forget diamonds, guinea pigs are a girl's best friend! Who needs sparkle when you've got those cute little squeaks?",
                "Guinea pigs: the secret rulers of the pet kingdom. Just try saying no to those fuzzy faces!"
            ]
        ],
        [
            'title' => 'Web Development Best Practices',
            'excerpt' => 'Master the art of <strong>web development</strong>.',
            'body' => '<p><strong>Web development</strong> is an ever-evolving field with a wide range of technologies and practices. To create successful websites and web applications, developers need to follow <strong>best practices</strong>.</p>
     <p>Key aspects of <strong>web development</strong> include front-end and back-end development, <strong>responsive design</strong>, <strong>performance optimization</strong>, and <strong>security</strong>. Staying updated with the latest trends and tools is crucial for success.</p>
     <p>In this blog post, we will dive into the essential <strong>best practices</strong> that every web developer should be aware of and incorporate into their work.</p>',
            'comments' => [
                "Web development: where 'It works on my machine' is the developer's mantra.",
                "Remember, in web development, if at first, you don't succeed, try refreshing the page.",
                "Web developers: turning caffeine into code since forever.",
                "Web development is like riding a bike, except the bike is on fire, and you're in hell.",
                "Ah, web development, where every browser is a different flavor of 'special'.",
                "Web development tip: If you're not sure what to do, just add more JavaScript.",
                "In web development, CSS stands for 'Can't Style Stuff'."
            ]
        ],
        [
            'title' => 'Guinea Pigs as Companions',
            'excerpt' => 'Why <strong>guinea pigs</strong> make great pets.',
            'body' => '<p><strong>Guinea pigs</strong> are not just cute; they are also gentle and social animals that can bring joy to your life. They are known for their friendly behavior and <i>affectionate</i> nature.</p>
     <p>When properly cared for, <strong>guinea pigs</strong> can form strong bonds with their owners and become cherished companions. This post will discuss the reasons why <strong>guinea pigs</strong> make great pets and how to care for them.</p>',
            'comments' => [
                "Guinea pigs: the original therapy animals. Who needs a therapist when you have a fuzzy friend?",
                "You haven't experienced true happiness until you've had a guinea pig fall asleep in your lap.",
                "Guinea pigs are like potato chips - you can't have just one!",
                "They say diamonds are a girl's best friend, but have they ever met a guinea pig?",
                "Life is better with a guinea pig. They're like little balls of sunshine!",
                "Guinea pigs: proof that good things come in small, fluffy packages.",
                "Ever met a guinea pig? They're basically happiness in a fur coat.",
                "Forget stress balls, just pet a guinea pig.",
                "Guinea pigs: because who needs a fancy alarm clock when you have morning wheekers?",
                "Just when you think your heart couldn't get any fuller, along comes a guinea pig.",
                "Guinea pigs are like velcro - once they stick to your heart, they're there to stay.",
                "You can't buy happiness, but you can buy a guinea pig, and that's pretty much the same thing."
            ]
        ],
        [
            'title' => 'Python: A Versatile Language',
            'excerpt' => 'Explore the power of <strong>Python</strong> programming.',
            'body' => '<p><strong>Python</strong> is a versatile programming language known for its simplicity and flexibility. It has gained popularity in various fields, including <strong>web development</strong>, <strong>data science</strong>, and <strong>automation</strong>.</p>
     <p>With its clear and readable syntax, <strong>Python</strong> is an excellent choice for beginners. You can use it to create web applications, analyze <strong>data</strong>, build machine learning models, and much more.</p>
     <p>This blog post will introduce you to the world of <strong>Python</strong> and highlight some of its key features and use cases.</p>',
            'comments' => [
                "Python? More like 'Py-don't'! It's just another snake in the coding jungle.",
                "Python is overrated. I'd rather wrestle with a bear than deal with its whitespace issues."
            ]
        ],
        [
            'title' => 'Caring for Your Guinea Pig',
            'excerpt' => 'Essential tips for <strong>guinea pig</strong> owners.',
            'body' => '<p>Proper care is crucial to ensure the health and happiness of your <strong>guinea pig</strong>. These small creatures have specific needs that must be met to keep them thriving.</p>
     <p>This post will provide essential tips on <strong>guinea pig care</strong>, covering topics such as <i>diet</i>, <i>housing</i>, <i>grooming</i>, and social interaction. By following these guidelines, you can provide your <strong>guinea pig</strong> with a loving and healthy environment.</p>',
            'comments' => [
                "Taking care of guinea pigs is like having your own furry therapy session. They're the ultimate stress-relievers!",
                "Guinea pig care can be a bit overwhelming at first, but once you get the hang of it, it's like second nature.",
                "Trying to trim a guinea pig's nails is like performing open-heart surgery on a squirming marshmallow.",
                "The joy of seeing your guinea pig popcorn around their cage is unmatched!",
                "Just when you think you've got their diet figured out, they decide they're suddenly allergic to everything."
            ]
        ],
        [
            'title' => 'Software Development Lifecycle',
            'excerpt' => 'Understanding the stages of <strong>software development</strong>.',
            'body' => '<p>The software development lifecycle encompasses <strong>planning</strong>, <strong>development</strong>, <strong>testing</strong>, and more. It is a structured process that ensures software projects are completed successfully.</p>
     <p>Understanding each stage of the <strong>software development</strong> lifecycle is crucial for developers and project managers. This blog post will break down the key phases and their importance in delivering high-quality <strong>software products</strong>.</p>',
            'comments' => []
        ],
        [
            'title' => 'Programming Guinea Pigs',
            'excerpt' => 'When <strong>Guinea Pigs</strong> Meet Coding',
            'body' => '<p>Imagine a world where <strong>guinea pigs</strong> are not only adorable pets but also coding enthusiasts. In this unique blog post, we explore the fascinating concept of "Programming <strong>Guinea Pigs</strong>."</p>
     <p>While <strong>guinea pigs</strong> may not be able to write code themselves, they can certainly keep you company during those late-night coding sessions. Their soft fur and soothing squeaks are the perfect antidote to <strong>debugging</strong> frustrations.</p>
     <p>We\'ll also discuss the benefits of having a <strong>guinea pig</strong> as your coding companion and how they can provide you with the motivation you need to tackle even the toughest coding challenges.</p>
     <p>So, join us on this whimsical journey into the world of <strong>coding</strong> and <strong>guinea pigs</strong>, where paws and keyboards meet in perfect harmony!</p>',
            'comments' => [
                "Forget rubber duck debugging, I prefer guinea pig debugging. They're much better listeners!",
                "Finally, a programming language that runs on carrots and lettuce! Where do I sign up?",
                "Who needs a coding buddy when you can have a guinea pig as your pair programmer?",
                "Introducing the newest coding bootcamp: 'Paws on Keyboards' - taught by guinea pigs, for guinea pigs!",
                "I always knew guinea pigs were secretly geniuses. It's only a matter of time before they take over GitHub.",
                "Programming guinea pigs: the ultimate hackathon partners. They've got the snacks covered!",
                "Step aside, Elon Musk. Guinea pigs are the true pioneers of coding in space.",
                "I wonder if guinea pigs prefer tabs or spaces...",
                "Debugging with guinea pigs: because nothing says 'motivation' like a furry little friend cheering you on.",
                "Forget the rat race, I'm joining the guinea pig code race!"
            ]
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->data as $postData) {
            // get the comment array and then remove it from $postData
            $comments = $postData['comments'];
            unset($postData['comments']);

            // Create the new post in the database
            $post = Post::create($postData);

            // Loop through the comments and create a new Comment model
            // that is related to the $post
            foreach ($comments as $comment) {
                $post->comments()->create([
                    'content' => $comment
                ]);
            }
        }
    }
}
