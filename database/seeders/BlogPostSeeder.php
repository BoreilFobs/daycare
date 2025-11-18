<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Get admin user
        $admin = User::where('role', 'admin')->first();
        
        if (!$admin) {
            $this->command->error('No admin user found. Please run DatabaseSeeder first.');
            return;
        }

        $blogPosts = [
            [
                'title' => 'The Importance of Early Childhood Education',
                'slug' => 'importance-of-early-childhood-education',
                'excerpt' => 'Discover why the first five years of a child\'s life are crucial for brain development and how quality early education sets the foundation for lifelong learning.',
                'content' => '<p>The first five years of a child\'s life are critical for brain development. During this time, children\'s brains form more than one million neural connections every second—a pace never repeated again in their lives.</p>

<h2>Why Early Education Matters</h2>
<p>Quality early childhood education provides:</p>
<ul>
    <li><strong>Cognitive Development:</strong> Building blocks for reading, math, and problem-solving skills</li>
    <li><strong>Social-Emotional Growth:</strong> Learning to interact, share, and manage emotions</li>
    <li><strong>Language Development:</strong> Vocabulary building and communication skills</li>
    <li><strong>Physical Development:</strong> Fine and gross motor skill development</li>
</ul>

<h2>Research Shows</h2>
<p>Studies consistently demonstrate that children who attend quality early education programs:</p>
<ul>
    <li>Are more likely to graduate high school</li>
    <li>Have higher earnings as adults</li>
    <li>Are less likely to need special education services</li>
    <li>Show better social skills and emotional regulation</li>
</ul>

<h2>What Makes Quality Early Education?</h2>
<p>Look for programs that offer:</p>
<ul>
    <li>Qualified, caring teachers</li>
    <li>Small class sizes and low teacher-to-child ratios</li>
    <li>Play-based learning approaches</li>
    <li>Safe, stimulating environments</li>
    <li>Parent involvement opportunities</li>
</ul>

<p>At ABC Children Centre, we understand the critical importance of these early years and are committed to providing an environment where every child can thrive.</p>',
                'featured_image' => null,
                'author_id' => $admin->id,
                'category' => 'Education',
                'tags' => 'early childhood, brain development, education, learning',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(5),
                'views' => 245,
            ],
            [
                'title' => '10 Tips for a Smooth Transition to Daycare',
                'slug' => '10-tips-smooth-transition-daycare',
                'excerpt' => 'Starting daycare can be emotional for both parents and children. Here are our top tips to make the transition as smooth as possible for your little one.',
                'content' => '<p>Starting daycare is a big step for your family. Here are proven strategies to help make the transition easier:</p>

<h2>1. Visit Together First</h2>
<p>Take your child to visit the center several times before their first official day. Let them explore the classroom and meet their teachers.</p>

<h2>2. Establish a Goodbye Routine</h2>
<p>Create a consistent, brief goodbye routine. A special hug, kiss, and phrase like "I\'ll be back after naptime" helps children know what to expect.</p>

<h2>3. Start Gradually</h2>
<p>If possible, begin with shorter days and gradually increase the time. This helps your child adjust to the new environment at their own pace.</p>

<h2>4. Bring Comfort Items</h2>
<p>A favorite stuffed animal or blanket from home can provide comfort during the adjustment period.</p>

<h2>5. Stay Positive</h2>
<p>Children pick up on your emotions. Show excitement and confidence about their new adventure, even if you feel anxious.</p>

<h2>6. Be Consistent</h2>
<p>Try to drop off at the same time each day. Consistency helps children feel secure.</p>

<h2>7. Don\'t Sneak Away</h2>
<p>Always say goodbye, even if tears follow. Sneaking away can damage trust and increase anxiety.</p>

<h2>8. Communicate with Teachers</h2>
<p>Share information about your child\'s routines, preferences, and any concerns. We\'re partners in your child\'s care.</p>

<h2>9. Expect Some Tears</h2>
<p>Crying at drop-off is normal and usually brief. Most children settle within minutes of parents leaving.</p>

<h2>10. Be Patient</h2>
<p>Adjustment takes time—typically 2-4 weeks. Some children adapt quickly, others need more time. Trust the process.</p>

<p>Remember, our experienced teachers are here to support you and your child through this transition. Don\'t hesitate to reach out with questions or concerns!</p>',
                'featured_image' => null,
                'author_id' => $admin->id,
                'category' => 'Parenting Tips',
                'tags' => 'daycare, transition, tips, parenting',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(12),
                'views' => 189,
            ],
            [
                'title' => 'Healthy Lunchbox Ideas for Preschoolers',
                'slug' => 'healthy-lunchbox-ideas-preschoolers',
                'excerpt' => 'Packing nutritious, kid-approved lunches can be challenging. Get inspired with these creative, healthy lunchbox ideas that your preschooler will love!',
                'content' => '<p>Nutrition plays a crucial role in your child\'s growth, development, and ability to learn. Here are fun, healthy lunchbox ideas that are both nutritious and appealing to young children.</p>

<h2>Building a Balanced Lunchbox</h2>
<p>Every lunch should include:</p>
<ul>
    <li>A protein source</li>
    <li>Whole grains</li>
    <li>Fruits and vegetables</li>
    <li>A healthy fat</li>
    <li>Water or milk</li>
</ul>

<h2>Creative Lunch Ideas</h2>

<h3>The Rainbow Box</h3>
<ul>
    <li>Turkey and cheese roll-ups</li>
    <li>Whole grain crackers</li>
    <li>Cherry tomatoes, orange slices, blueberries</li>
    <li>Hummus for dipping</li>
</ul>

<h3>DIY Pizza Lunch</h3>
<ul>
    <li>Whole wheat mini pitas</li>
    <li>Tomato sauce in a small container</li>
    <li>Shredded cheese</li>
    <li>Cucumber sticks</li>
    <li>Apple slices with almond butter</li>
</ul>

<h3>The Breakfast-for-Lunch Box</h3>
<ul>
    <li>Mini whole grain waffles</li>
    <li>Greek yogurt with berries</li>
    <li>Hard-boiled egg</li>
    <li>Orange segments</li>
</ul>

<h2>Tips for Success</h2>
<ol>
    <li><strong>Make it fun:</strong> Use cookie cutters for sandwiches, create faces with food</li>
    <li><strong>Include variety:</strong> Rotate foods to prevent boredom</li>
    <li><strong>Let them help:</strong> Involve children in planning and packing</li>
    <li><strong>Keep it simple:</strong> Young children often prefer foods separate rather than mixed</li>
    <li><strong>Pack safely:</strong> Use ice packs to keep foods at safe temperatures</li>
</ol>

<h2>Foods to Limit</h2>
<p>Try to avoid or minimize:</p>
<ul>
    <li>Sugary drinks and excessive juice</li>
    <li>Highly processed snacks</li>
    <li>Foods high in added sugars</li>
    <li>Choking hazards for younger children</li>
</ul>

<p>Remember, at ABC Children Centre, we provide nutritious meals and snacks daily. These ideas are perfect for home lunches and weekend meals!</p>',
                'featured_image' => null,
                'author_id' => $admin->id,
                'category' => 'Nutrition',
                'tags' => 'nutrition, healthy eating, lunchbox, preschool',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(18),
                'views' => 312,
            ],
            [
                'title' => 'Understanding Toddler Tantrums: A Parent\'s Guide',
                'slug' => 'understanding-toddler-tantrums',
                'excerpt' => 'Tantrums are a normal part of toddler development. Learn why they happen and effective strategies for handling them with patience and understanding.',
                'content' => '<p>If your toddler has ever melted down in the middle of a store or refused to get dressed in the morning, you\'re not alone. Tantrums are a normal, albeit challenging, part of early childhood development.</p>

<h2>Why Tantrums Happen</h2>
<p>Toddlers have tantrums because they:</p>
<ul>
    <li><strong>Can\'t express their feelings:</strong> Limited language skills make it hard to communicate needs and frustrations</li>
    <li><strong>Want independence:</strong> They\'re testing boundaries and asserting autonomy</li>
    <li><strong>Feel overwhelmed:</strong> Too much stimulation, hunger, or fatigue can trigger meltdowns</li>
    <li><strong>Are learning self-control:</strong> The part of the brain that manages emotions is still developing</li>
</ul>

<h2>Prevention Strategies</h2>
<ol>
    <li><strong>Stick to routines:</strong> Predictability helps children feel secure</li>
    <li><strong>Offer choices:</strong> "Do you want the red shirt or blue shirt?" gives a sense of control</li>
    <li><strong>Avoid triggers:</strong> Don\'t shop when they\'re tired or hungry</li>
    <li><strong>Give advance notice:</strong> "In five minutes, it will be time to clean up"</li>
    <li><strong>Teach emotional vocabulary:</strong> Help them name feelings: "You seem frustrated"</li>
</ol>

<h2>During a Tantrum</h2>
<ul>
    <li><strong>Stay calm:</strong> Your composure helps them regulate their emotions</li>
    <li><strong>Ensure safety:</strong> Move them to a safe space if needed</li>
    <li><strong>Validate feelings:</strong> "I know you\'re upset that we have to leave the park"</li>
    <li><strong>Don\'t give in:</strong> Yielding reinforces tantrum behavior</li>
    <li><strong>Use distraction:</strong> Sometimes redirecting attention helps</li>
</ul>

<h2>After the Storm</h2>
<p>Once your child has calmed down:</p>
<ul>
    <li>Offer comfort and reassurance</li>
    <li>Talk about what happened using simple language</li>
    <li>Teach alternative behaviors: "Next time you\'re angry, use your words"</li>
    <li>Move on—don\'t dwell on the incident</li>
</ul>

<h2>When to Seek Help</h2>
<p>Consult your pediatrician if tantrums:</p>
<ul>
    <li>Increase in frequency or intensity after age 4</li>
    <li>Result in harm to the child or others</li>
    <li>Are accompanied by other concerning behaviors</li>
    <li>Significantly disrupt daily life</li>
</ul>

<p>Remember, this phase will pass. With patience, consistency, and understanding, you\'ll help your toddler develop healthy ways to express and manage their emotions.</p>',
                'featured_image' => null,
                'author_id' => $admin->id,
                'category' => 'Child Development',
                'tags' => 'tantrums, toddlers, behavior, parenting',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(25),
                'views' => 428,
            ],
            [
                'title' => 'The Benefits of Outdoor Play for Young Children',
                'slug' => 'benefits-outdoor-play-young-children',
                'excerpt' => 'Outdoor play isn\'t just fun—it\'s essential for children\'s physical, emotional, and cognitive development. Discover the many benefits of getting outside!',
                'content' => '<p>In our increasingly digital world, outdoor play is more important than ever for young children. Here\'s why we prioritize outdoor time every day at ABC Children Centre.</p>

<h2>Physical Benefits</h2>
<ul>
    <li><strong>Gross motor development:</strong> Running, jumping, climbing build strength and coordination</li>
    <li><strong>Better health:</strong> Outdoor play combats childhood obesity and improves cardiovascular health</li>
    <li><strong>Vitamin D:</strong> Sunlight exposure helps bodies produce this essential vitamin</li>
    <li><strong>Stronger immune systems:</strong> Exposure to diverse outdoor environments builds immunity</li>
    <li><strong>Improved sleep:</strong> Physical activity and fresh air promote better rest</li>
</ul>

<h2>Cognitive Development</h2>
<p>Outdoor play enhances learning through:</p>
<ul>
    <li><strong>Problem-solving:</strong> Navigating natural environments requires creative thinking</li>
    <li><strong>Imagination:</strong> Nature provides endless props for pretend play</li>
    <li><strong>Attention and focus:</strong> Nature experiences can improve concentration</li>
    <li><strong>Scientific thinking:</strong> Observing weather, plants, and animals sparks curiosity</li>
</ul>

<h2>Social-Emotional Growth</h2>
<ul>
    <li><strong>Risk assessment:</strong> Learning to evaluate challenges safely</li>
    <li><strong>Confidence:</strong> Mastering physical challenges builds self-esteem</li>
    <li><strong>Stress reduction:</strong> Nature has calming effects on children</li>
    <li><strong>Social skills:</strong> Outdoor play often involves cooperation and negotiation</li>
</ul>

<h2>Connection to Nature</h2>
<p>Early positive experiences with nature:</p>
<ul>
    <li>Foster environmental awareness and stewardship</li>
    <li>Build appreciation for the natural world</li>
    <li>Create lifelong outdoor enthusiasts</li>
    <li>Provide a sense of wonder and discovery</li>
</ul>

<h2>Making the Most of Outdoor Time</h2>
<p>Tips for families:</p>
<ol>
    <li>Aim for at least 60 minutes of outdoor play daily</li>
    <li>Provide open-ended materials: sticks, stones, sand, water</li>
    <li>Dress appropriately for the weather—there\'s no bad weather, just bad clothing!</li>
    <li>Follow your child\'s interests and curiosity</li>
    <li>Limit structured activities; free play is powerful</li>
    <li>Join in the play sometimes, but also let children explore independently</li>
</ol>

<h2>Our Outdoor Spaces</h2>
<p>At ABC Children Centre, our outdoor play areas include:</p>
<ul>
    <li>Climbing structures for gross motor development</li>
    <li>Sandbox for sensory play and creativity</li>
    <li>Garden beds where children grow vegetables</li>
    <li>Open spaces for running and ball games</li>
    <li>Shaded areas for quiet observation</li>
    <li>Natural materials for exploration and play</li>
</ul>

<p>We believe outdoor play is not a luxury—it\'s a necessity for healthy child development!</p>',
                'featured_image' => null,
                'author_id' => $admin->id,
                'category' => 'Activities',
                'tags' => 'outdoor play, child development, nature, physical activity',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(32),
                'views' => 267,
            ],
            [
                'title' => 'Building Pre-Reading Skills in Preschoolers',
                'slug' => 'building-pre-reading-skills-preschoolers',
                'excerpt' => 'Reading readiness starts long before formal reading instruction. Learn fun, playful ways to build essential literacy skills in preschool-aged children.',
                'content' => '<p>Literacy development begins in infancy and continues throughout early childhood. Here are engaging ways to build the foundation for reading success.</p>

<h2>Essential Pre-Reading Skills</h2>

<h3>1. Phonological Awareness</h3>
<p>The ability to hear and manipulate sounds in words:</p>
<ul>
    <li>Sing songs and rhymes</li>
    <li>Play rhyming games</li>
    <li>Clap out syllables in names and words</li>
    <li>Play with alliteration ("silly, sassy snake")</li>
</ul>

<h3>2. Print Awareness</h3>
<p>Understanding that print carries meaning:</p>
<ul>
    <li>Point to words while reading</li>
    <li>Show that we read left to right</li>
    <li>Identify letters in the environment</li>
    <li>Write your child\'s name on their artwork</li>
</ul>

<h3>3. Letter Knowledge</h3>
<p>Recognizing and naming letters:</p>
<ul>
    <li>Read alphabet books</li>
    <li>Make letters with playdough</li>
    <li>Hunt for letters on signs and labels</li>
    <li>Start with the letters in their name</li>
</ul>

<h3>4. Vocabulary Development</h3>
<p>Building word knowledge:</p>
<ul>
    <li>Have conversations throughout the day</li>
    <li>Read diverse books together</li>
    <li>Introduce new words and explain meanings</li>
    <li>Encourage questions and curiosity</li>
</ul>

<h2>Reading Together: Best Practices</h2>
<ol>
    <li><strong>Make it interactive:</strong> Ask questions, make predictions, discuss the story</li>
    <li><strong>Read it again:</strong> Repetition builds comprehension and confidence</li>
    <li><strong>Let them "read" to you:</strong> Retelling stories in their own words builds skills</li>
    <li><strong>Choose quality books:</strong> Rich language, engaging stories, diverse characters</li>
    <li><strong>Follow their interests:</strong> Dinosaurs, trucks, princesses—enthusiasm drives learning</li>
    <li><strong>Establish a routine:</strong> Daily reading time, even just 15 minutes, makes a difference</li>
</ol>

<h2>Beyond Books</h2>
<p>Literacy skills develop through many activities:</p>
<ul>
    <li><strong>Dramatic play:</strong> Pretending to read menus, write shopping lists</li>
    <li><strong>Writing center:</strong> Provide paper, crayons, markers, pencils</li>
    <li><strong>Environmental print:</strong> Read signs, labels, logos together</li>
    <li><strong>Storytelling:</strong> Encourage oral storytelling about their day</li>
    <li><strong>Songs and fingerplays:</strong> Build phonological awareness</li>
</ul>

<h2>Red Flags to Watch For</h2>
<p>Consult with teachers or specialists if your child:</p>
<ul>
    <li>Shows no interest in books or being read to</li>
    <li>Has difficulty learning letters after repeated exposure</li>
    <li>Struggles to hear rhymes or distinguish sounds</li>
    <li>Has limited vocabulary compared to peers</li>
    <li>Doesn\'t attempt to write or make letter-like marks</li>
</ul>

<h2>Our Literacy-Rich Environment</h2>
<p>At ABC Children Centre, we:</p>
<ul>
    <li>Read aloud multiple times daily</li>
    <li>Provide diverse, high-quality books</li>
    <li>Label classroom items to build print awareness</li>
    <li>Offer writing materials in every learning center</li>
    <li>Teach letter sounds through songs and games</li>
    <li>Celebrate emerging literacy skills</li>
</ul>

<p>Remember, every child develops at their own pace. Our goal is to foster a love of reading that will last a lifetime!</p>',
                'featured_image' => null,
                'author_id' => $admin->id,
                'category' => 'Education',
                'tags' => 'reading, literacy, preschool, education',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(40),
                'views' => 356,
            ],
            [
                'title' => 'Social-Emotional Learning: Why It Matters',
                'slug' => 'social-emotional-learning-importance',
                'excerpt' => 'Social-emotional skills are just as important as academic skills for success in school and life. Learn how we support this crucial development.',
                'content' => '<p>While academic skills are important, research shows that social-emotional competence is equally crucial for children\'s success and well-being.</p>

<h2>What is Social-Emotional Learning?</h2>
<p>SEL involves developing skills to:</p>
<ul>
    <li>Understand and manage emotions</li>
    <li>Set and achieve positive goals</li>
    <li>Feel and show empathy for others</li>
    <li>Establish and maintain positive relationships</li>
    <li>Make responsible decisions</li>
</ul>

<h2>Why SEL Matters</h2>
<p>Children with strong social-emotional skills:</p>
<ul>
    <li>Have better academic performance</li>
    <li>Form healthier relationships</li>
    <li>Show better behavior and fewer discipline issues</li>
    <li>Experience less anxiety and depression</li>
    <li>Develop stronger problem-solving skills</li>
    <li>Are more resilient in facing challenges</li>
</ul>

<h2>How We Support SEL</h2>

<h3>Creating a Safe Environment</h3>
<ul>
    <li>Consistent routines provide security</li>
    <li>Clear, age-appropriate expectations</li>
    <li>Positive reinforcement of desired behaviors</li>
    <li>Opportunities for choice and autonomy</li>
</ul>

<h3>Teaching Emotional Literacy</h3>
<ul>
    <li>Naming and discussing emotions</li>
    <li>Reading books about feelings</li>
    <li>Validating children\'s emotions</li>
    <li>Modeling healthy emotional expression</li>
</ul>

<h3>Developing Social Skills</h3>
<ul>
    <li>Practicing turn-taking and sharing</li>
    <li>Role-playing social scenarios</li>
    <li>Teaching conflict resolution strategies</li>
    <li>Encouraging cooperation and teamwork</li>
</ul>

<h3>Building Self-Regulation</h3>
<ul>
    <li>Teaching calming strategies (deep breaths, quiet space)</li>
    <li>Practicing patience and delayed gratification</li>
    <li>Helping children recognize their triggers</li>
    <li>Providing tools for self-soothing</li>
</ul>

<h2>Supporting SEL at Home</h2>
<ol>
    <li><strong>Model emotional intelligence:</strong> Name your own feelings and handle stress constructively</li>
    <li><strong>Validate emotions:</strong> "I see you\'re disappointed" before problem-solving</li>
    <li><strong>Teach problem-solving:</strong> Guide rather than solve for them</li>
    <li><strong>Practice empathy:</strong> "How do you think she felt when...?"</li>
    <li><strong>Set clear boundaries:</strong> Limits help children feel secure</li>
    <li><strong>Allow natural consequences:</strong> Learning opportunities in safe situations</li>
    <li><strong>Celebrate effort:</strong> Focus on growth, not just outcomes</li>
</ol>

<h2>Age-Appropriate Expectations</h2>

<h3>Toddlers (1-3 years)</h3>
<ul>
    <li>Beginning to play alongside peers</li>
    <li>Starting to identify basic emotions</li>
    <li>Developing self-awareness</li>
    <li>Limited impulse control (completely normal!)</li>
</ul>

<h3>Preschoolers (3-5 years)</h3>
<ul>
    <li>Playing cooperatively with others</li>
    <li>Understanding and expressing complex emotions</li>
    <li>Beginning to understand others\' perspectives</li>
    <li>Developing self-control and patience</li>
</ul>

<h2>Partnership Between Home and School</h2>
<p>SEL is most effective when we work together:</p>
<ul>
    <li>Share observations about your child\'s social-emotional development</li>
    <li>Use consistent language and strategies</li>
    <li>Communicate about challenges and successes</li>
    <li>Celebrate growth together</li>
</ul>

<p>Remember, social-emotional development is a journey, not a destination. Every interaction is an opportunity to teach and reinforce these critical life skills!</p>',
                'featured_image' => null,
                'author_id' => $admin->id,
                'category' => 'Child Development',
                'tags' => 'social-emotional learning, child development, emotions',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(48),
                'views' => 298,
            ],
            [
                'title' => 'Screen Time Guidelines for Young Children',
                'slug' => 'screen-time-guidelines-young-children',
                'excerpt' => 'In our digital age, managing screen time is a common parenting challenge. Here are research-based guidelines and practical strategies for healthy media use.',
                'content' => '<p>Technology is everywhere, and screens are part of modern life. The key is finding balance and ensuring screen time supports rather than hinders development.</p>

<h2>Current Recommendations</h2>

<h3>Under 18 Months</h3>
<p>The American Academy of Pediatrics recommends:</p>
<ul>
    <li>Avoid screen media other than video chatting</li>
    <li>Exception: Video calls with family are valuable for social connection</li>
</ul>

<h3>18-24 Months</h3>
<ul>
    <li>If introducing media, choose high-quality programming</li>
    <li>Watch together and talk about what you see</li>
    <li>Limit to short periods</li>
</ul>

<h3>2-5 Years</h3>
<ul>
    <li>Limit screen time to 1 hour per day of high-quality programming</li>
    <li>Co-view when possible</li>
    <li>Understand what they\'re watching and teach them about content</li>
</ul>

<h2>Why Less is More for Young Children</h2>

<h3>Brain Development</h3>
<ul>
    <li>Young brains learn best through hands-on experiences</li>
    <li>Screens can\'t replace the learning that happens through play</li>
    <li>Interactive experiences build neural connections better than passive viewing</li>
</ul>

<h3>Language Development</h3>
<ul>
    <li>Children learn language best through back-and-forth conversations</li>
    <li>Even "educational" programs can\'t replace real interactions</li>
    <li>Excessive screen time is linked to language delays</li>
</ul>

<h3>Social-Emotional Development</h3>
<ul>
    <li>Reading faces, body language, and social cues requires practice</li>
    <li>Screens can\'t teach empathy and emotional regulation</li>
    <li>Interactive play with people builds social skills</li>
</ul>

<h3>Physical Health</h3>
<ul>
    <li>Young children need active play for healthy development</li>
    <li>Screen time often displaces physical activity</li>
    <li>Excessive screen use is linked to sleep problems</li>
</ul>

<h2>Creating Healthy Media Habits</h2>

<h3>Be Intentional</h3>
<ul>
    <li>Choose specific programs rather than random browsing</li>
    <li>Preview content to ensure it\'s age-appropriate</li>
    <li>Look for shows with educational value and positive messages</li>
</ul>

<h3>Make it Interactive</h3>
<ul>
    <li>Watch together when possible</li>
    <li>Talk about what you\'re seeing</li>
    <li>Ask questions and make connections to real life</li>
    <li>Extend learning offline with related activities</li>
</ul>

<h3>Set Clear Boundaries</h3>
<ul>
    <li>No screens during meals</li>
    <li>No screens an hour before bedtime</li>
    <li>Create "screen-free zones" in your home</li>
    <li>Use timers to mark the end of screen time</li>
</ul>

<h3>Model Healthy Use</h3>
<ul>
    <li>Children imitate what they see</li>
    <li>Limit your own screen time around children</li>
    <li>Give children your full attention during interactions</li>
    <li>Put phones away during family time</li>
</ul>

<h2>Better Alternatives</h2>
<p>Instead of screen time, offer:</p>
<ul>
    <li><strong>Creative play:</strong> Art, building blocks, pretend play</li>
    <li><strong>Physical activity:</strong> Outdoor play, dance, sports</li>
    <li><strong>Reading together:</strong> Books, stories, library visits</li>
    <li><strong>Family time:</strong> Cooking, games, conversations</li>
    <li><strong>Music and movement:</strong> Singing, dancing, instruments</li>
    <li><strong>Nature exploration:</strong> Parks, gardens, walks</li>
</ul>

<h2>When Screens Can Be Helpful</h2>
<p>Not all screen time is equal. Better uses include:</p>
<ul>
    <li>Video calls with distant family members</li>
    <li>Interactive educational apps used together</li>
    <li>Creating content (taking photos, making videos) rather than just consuming</li>
    <li>Brief, intentional viewing of quality educational content</li>
</ul>

<h2>Signs of Too Much Screen Time</h2>
<p>Watch for:</p>
<ul>
    <li>Tantrums when screens are turned off</li>
    <li>Loss of interest in other activities</li>
    <li>Sleep problems</li>
    <li>Difficulty with attention and focus</li>
    <li>Language or social delays</li>
</ul>

<h2>Our Screen-Free Environment</h2>
<p>At ABC Children Centre, we maintain a screen-free environment because:</p>
<ul>
    <li>Young children learn best through play and interaction</li>
    <li>We prioritize hands-on, sensory-rich experiences</li>
    <li>Our curriculum is built around active engagement</li>
    <li>Children need a balance to screen exposure at home</li>
</ul>

<p>Remember, the goal isn\'t to completely eliminate screens—they\'re part of modern life. The goal is balance, quality, and ensuring technology enhances rather than replaces the experiences that truly support development.</p>',
                'featured_image' => null,
                'author_id' => $admin->id,
                'category' => 'Parenting Tips',
                'tags' => 'screen time, technology, parenting, child development',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(55),
                'views' => 412,
            ],
        ];

        foreach ($blogPosts as $post) {
            BlogPost::create($post);
        }

        $this->command->info('Blog posts seeded successfully! Created ' . count($blogPosts) . ' posts.');
    }
}
