<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'The Ultimate Mini Excavator Buying Guide: 7 Factors for Smart Investment',
                'slug' => 'mini-excavator-buying-guide',
                'category' => 'Buying Guide',
                'excerpt' => 'Thinking about adding a compact excavator to your fleet? From transport weights and hydraulic flow requirements to zero-tail-swing physics and operator cabin comfort, here is exactly how to specify and compare mini excavators like an industry veteran.',
                'featured_image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=1200',
                'content' => '<p>Buying a mini excavator is a major investment for contractors, landscapers, farmers, and utility crews. These machines have quickly become the Swiss Army knives of modern jobsites due to their compact size, high hydraulic power, and attachment versatility. However, with dozens of brands and configurations available, choosing the right unit requires looking far beyond the brand sticker or the price tag. Specifying the wrong machine can lead to wasted fuel, logistics headaches, or equipment that is underpowered for your active workloads.</p>

<h3>1. Operating Weight and Transport Logistics</h3>
<p>The first and most critical specification to consider is the machine’s <strong>operating weight</strong>. Operating weight determines not only what the machine can dig and lift, but also how you will move it between jobsites.
<ul>
    <li><strong>1-Ton to 1.8-Ton Class:</strong> Ideal for residential landscaping, backyard utility trenches, and tight gate entries. These can easily be towed on standard utility trailers behind a half-ton pickup truck without a Commercial Driver’s License (CDL).</li>
    <li><strong>2.5-Ton to 3.5-Ton Class:</strong> The B2B sweet spot. These machines provide substantial digging depth (typically 9 to 10 feet) and high auxiliary hydraulic flow. Transporting them requires a 10,000-lb trailer and a three-quarter-ton truck (e.g., F-250 or equivalent).</li>
</ul>
Always match the operating weight of your prospective excavator to your existing truck and trailer capacities to avoid unexpected towing upgrades.</p>

<h3>2. Dig Depth vs. Reach Requirements</h3>
<p>Do not buy a machine that just barely hits your target digging depth. If your crew regularly installs sewer lines at 8 feet, you need an excavator rated for at least 9 or 10 feet of maximum digging depth. Operating a machine at its absolute mechanical limit reduces cycle times, increases fuel burn, and accelerates wear on structural pins and bushings. Ensure your machine has enough reach to dump into high-sided dump trucks without having to crawl up onto soil piles.</p>

<h3>3. Hydraulic Systems: Auxiliary Flow & PSI</h3>
<p>The core power of a modern excavator lies in its hydraulic system. If you plan to run demanding attachments—such as hydraulic thumbs, post hole augers, concrete breakers, or flail mowers—you must pay close attention to the <strong>auxiliary hydraulic flow rate (GPM)</strong> and <strong>operating pressure (PSI)</strong>. 
Many compact machines come with a single standard auxiliary circuit, but advanced units offer dual-direction hydraulics or dedicated high-flow circuits. A hydraulic thumb is an absolute must-have accessory for 90% of buyers, as it turns your excavator into a precise structural grabber for debris, logs, and concrete chunks.</p>

<h3>4. Tail Swing Configurations: Conventional vs. Zero-Tail-Swing</h3>
<p>How close will you be working to walls, trees, fences, and active traffic?
<ul>
    <li><strong>Conventional Tail Swing:</strong> The counterweight extends past the tracks when the cab rotates. These machines typically offer slightly higher lifting capacities over the sides and better stability because the center of gravity sits further back.</li>
    <li><strong>Zero-Tail-Swing (ZTS):</strong> The house rotates entirely within the width of the tracks. This is the gold standard for road work, foundation digging adjacent to structures, and tight forestry applications. You can rotate 360 degrees without worrying about denting the counterweight or damaging property.</li>
</ul></p>

<h3>5. Undercarriage Configurations: Rubber vs. Steel Tracks</h3>
<p>Choose tracks based on your typical operating surfaces:
<ul>
    <li><strong>Rubber Tracks:</strong> Best for turf, asphalt, concrete, and residential lawns. They minimize surface scarring, operate quieter, and provide a smoother ride for the operator.</li>
    <li><strong>Steel Tracks:</strong> Essential for muddy forest floors, sharp rocky terrains, demolition jobsites, and heavy land clearing. Steel tracks resist tears, maintain traction in wet soils, and outlast rubber tracks significantly in severe conditions.</li>
</ul></p>

<h3>6. Cab Environment & Pilot Controls</h3>
<p>An uncomfortable operator is an unproductive operator. If you plan to spend 6+ hours a day in the seat, choose a machine with a fully enclosed cab with Heating, Ventilation, and Air Conditioning (HVAC). Look for machines equipped with smooth <strong>hydraulic pilot controls</strong> rather than old-fashioned mechanical linkages. Hydraulic pilot controls require minimal operator effort and provide precise feedback, reducing fatigue and increasing safety.</p>

<h3>7. Maintenance Access & Serviceability</h3>
<p>Daily maintenance should not feel like an archeological dig. Before buying, pop open the rear engine shroud and side access doors. Daily inspection items—such as the engine oil dipstick, air filter, hydraulic fluid sight glass, coolant reservoir, and primary grease fittings—should be accessible from ground level. Easy-to-access service points guarantee that your operators will actually perform the required daily checks, protecting your machinery from catastrophic component failures.</p>

<h3>Summary Checklist for Excavator Buyers</h3>
<p>Before signing the papers, make sure you can answer these three questions:
<ol>
    <li>Can my current truck and trailer safely tow this machine and its attachments?</li>
    <li>Does the auxiliary hydraulic flow match the requirements of the heaviest attachment I intend to operate?</li>
    <li>Is the local dealer stocked with service parts, filters, and pins to support me when a hose blows on a Friday afternoon?</li>
</ol>
Taking the time to specify the exact parameters of your compact excavator ensures that your investment remains a profitable, highly utilized asset for years to come.</p>',
                'is_featured' => true,
                'status' => 'published',
                'published_at' => now()->subDays(6),
            ],
            [
                'title' => 'Industrial Forklift Safety: 8 Critical Rules Every Operator Must Follow',
                'slug' => 'forklift-safety-tips',
                'category' => 'Safety',
                'excerpt' => 'Forklift accidents account for nearly 100,000 workplace injuries each year. Minimize risk, safeguard warehouse assets, and protect your crew with this comprehensive checklist of operational safety procedures and pre-shift inspections.',
                'featured_image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&q=80&w=1200',
                'content' => '<p>Industrial forklifts are the backbone of modern logistics, shipping docks, and manufacturing plants. They move millions of tons of freight every single day. But their heavy counterweights, narrow wheel bases, and front-loading mechanics also make them highly dangerous when operated carelessly. According to safety statistics, forklift tips and pedestrian strikes are among the leading causes of severe industrial injuries. Developing a strict culture of forklift safety is essential to protecting your workforce and protecting your inventory.</p>

<h3>1. Conduct a Rigorous Pre-Shift Inspection</h3>
<p>Never climb into the operator’s seat without performing a walkaround visual and physical inspection. An operator’s daily checklist should include:
<ul>
    <li>Checking tires for dry rot, gouges, or low air pressure (on pneumatic models).</li>
    <li>Inspecting the mast, chains, and forks for cracks, bending, or hydraulic fluid leaks.</li>
    <li>Testing warning alarms, horn, backup lights, and emergency beacons.</li>
    <li>Ensuring that seatbelts and overhead guards are fully functional and undamaged.</li>
</ul>
If you identify any issue during the inspection, tag the machine as Out of Service immediately and notify your shop manager.</p>

<h3>2. Master the "Stability Triangle"</h3>
<p>Unlike standard cars, forklifts operate on a three-point suspension system consisting of the two front drive tires and the center pivot of the rear steering axle. This creates a geometric <strong>"stability triangle"</strong>. 
The forklift’s center of gravity (CG) shifts dynamically as you lift and carry loads. To prevent a catastrophic tip-over:
<ul>
    <li>Always carry loads as low to the ground as possible (typically 2 to 4 inches from the floor) during transport.</li>
    <li>Never make sharp turns at high speed, especially when carrying a load.</li>
    <li>Ensure the load is centered on the forks and tilted back slightly to lock the center of gravity over the drive axle.</li>
</ul></p>

<h3>3. Enforce Strict Pedestrian Separation Zones</h3>
<p>More than half of all forklift accidents involve pedestrians. Establish designated walkways throughout your warehouse and enforce a strict 10-foot boundary rule between pedestrians and operating equipment. Operators must slow down, sound their horn, and verify eye contact before crossing warehouse intersections, doorways, or blind spots. Equipping forklifts with blue LED projection lights on the rear and sides gives pedestrians a clear visual warning of approaching machines.</p>

<h3>4. Handle Loads Within Rated Capacities</h3>
<p>Every forklift features a factory load plate indicating its safe lifting capacities at specific load centers (typically 24 inches). Exceeding these limits shifts the center of gravity too far forward, lifting the steering wheels off the floor and making control impossible. If a load is exceptionally long or awkwardly shaped, its center shifts forward, which drastically reduces the maximum safe weight the forklift can carry.</p>

<h3>5. Correct Dock and Ramp Procedures</h3>
<p>Operating a forklift on ramps, docks, and steep inclines requires strict adherence to grade rules:
<ul>
    <li><strong>When carrying a load:</strong> Always drive with the load facing uphill (drive forward up ramps, and back down ramps) to prevent the load from sliding off the forks.</li>
    <li><strong>When empty:</strong> Always drive with the forks facing downhill (drive backward up, and forward down) to maintain drive-wheel traction.</li>
    <li>Never attempt to turn a forklift on a ramp or incline, as this almost always results in a lateral roll-over.</li>
</ul></p>

<h3>6. Ensure Proper Load Securing & Alignment</h3>
<p>Before lifting a pallet, adjust the fork spacing to distribute the load weight as widely and evenly as possible. Drive the forks completely into the pallet until the load rests flat against the upright carriage. Inspect the pallet itself for split lumber, missing boards, or dry rot that could collapse under weight, dropping material onto coworkers or damaging stock.</p>

<h3>7. Respect the Travel Path</h3>
<p>Keep floors clear of oil spills, grease, water, loose cords, and wood debris. A small piece of 2x4 lumber or a single rock can stop a solid cushion tire instantly, causing the load to slide or the forklift to swing wildly. When carrying high loads that obstruct your forward vision, operators must drive the forklift in reverse, looking over their shoulders rather than leaning out to look around the mast.</p>

<h3>8. Proper Parking & Shutdown Protocols</h3>
<p>A parked forklift should never present a hazard to others. When parking at the end of a shift:
<ol>
    <li>Park the machine on flat, level ground.</li>
    <li>Fully lower the forks to the floor, tilting them forward slightly so they rest flat against the concrete (preventing trip hazards).</li>
    <li>Put the transmission in neutral and engage the parking brake.</li>
    <li>Turn the key off and remove it to prevent unauthorized operation.</li>
</ol></p>',
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(4),
            ],
            [
                'title' => 'Wheel Loader vs. Skid Steer: A Head-to-Head Comparison for Earthmoving',
                'slug' => 'wheel-loader-vs-skid-steer',
                'category' => 'Industry Tips',
                'excerpt' => 'Struggling to choose between a compact wheel loader and a heavy-duty skid steer? This head-to-head comparison breaks down operating costs, visibility, cycle times, tire wear, and work versatility to help you pick the right machine.',
                'featured_image' => 'https://images.unsplash.com/photo-1489515217757-5fd1be406fef?auto=format&fit=crop&q=80&w=1200',
                'content' => '<p>When it comes to moving soil, loading gravel, clearing snow, or running attachment tools, contractors face one of the most classic debates in the heavy equipment industry: <strong>Wheel Loader vs. Skid Steer Loader</strong>. While both machines carry materials and lift buckets, their chassis designs, steering mechanics, and operating systems are completely different. Choosing the wrong platform can result in excessive tire wear, poor cycle times, or structural site damage. Here is a practical breakdown to help you match the right machine to your daily jobsites.</p>

<h3>1. Maneuverability & Site Impact</h3>
<p>The core difference between these two machines lies in how they steer:
<ul>
    <li><strong>Skid Steers:</strong> Steer by locking one side of the machine while driving the other, allowing them to spin 360 degrees inside their own footprint (zero-radius turning). This makes them incredibly nimble for tight residential backyards, crowded demolition yards, and narrow alleyways. However, this skidding action tears up turf, scars asphalt, and wears down rubber tires rapidly.</li>
    <li><strong>Wheel Loaders:</strong> Utilize an articulated frame that pivots in the center. This allows them to turn without skidding the tires, leaving turf intact and virtually eliminating tire wear on hard asphalt or gravel. However, their turning radius is wider, requiring more operating space to maneuver.</li>
</ul></p>

<h3>2. Loading Cycle Times & Traveling Speed</h3>
<p>If your primary job is scoop-and-carry or loading dump trucks, a compact wheel loader is hard to beat:
<ul>
    <li><strong>Speed:</strong> Compact wheel loaders typically travel at speeds of 12 to 20 mph, whereas skid steers are limited to 7 to 12 mph. If you need to move material across a large commercial site, subdivision, or farm, the loader will complete cycles twice as fast.</li>
    <li><strong>Lifting Profile:</strong> Wheel loaders feature a central linkage and elevated cab that makes dumping into high-sided tandem dump trucks easy. Skid steers sit lower, making truck loading a slower, more deliberate process.</li>
</ul></p>

<h3>3. Operating Costs & Fuel Efficiency</h3>
<p>For fleet managers, the total cost of ownership (TCO) is a major deciding factor:
<ul>
    <li><strong>Fuel Consumption:</strong> An articulated wheel loader is highly efficient, often burning 30% to 50% less fuel than a skid steer of equal horsepower because it doesn\'t have to fight constant steering friction.</li>
    <li><strong>Tire Longevity:</strong> A set of skid steer tires may only last 300 to 500 hours on hard concrete due to constant skidding. In contrast, wheel loader tires regularly last 1,500 to 2,000+ hours because they roll smoothly during articulation.</li>
</ul></p>

<h3>4. Attachment Versatility</h3>
<p>If you need one machine to dig trenches today, sweep streets tomorrow, and grind stumps next week, the <strong>skid steer is the clear winner</strong>. The skid steer universal quick-attach plate and high auxiliary hydraulic systems support an endless array of attachment tools—including augers, trenchers, sweepers, cold planers, brush cutters, and dozer blades. Wheel loaders are typically optimized for buckets, forks, and grapples, making them dedicated loading and material handling specialists.</p>

<h3>5. Operator Ergonomics & Visibility</h3>
<p>Operating heavy equipment for 8 hours can take a toll on the body:
<ul>
    <li><strong>Wheel Loaders:</strong> Feature elevated cabs with glass on all four sides. The operator sits high above the loader arms, providing a clear, unobstructed 360-degree view of the jobsite and obstacles. Entry is easy through a standard side door.</li>
    <li><strong>Skid Steers:</strong> The operator sits low inside a cage surrounded by loader arms. Visibility to the sides and rear is heavily restricted, especially when the loader arms are raised. Entering requires climbing over the front bucket, which can be slippery and difficult in wet or muddy conditions.</li>
</ul></p>

<h3>Machinery Comparison Matrix</h3>
<table border="1" cellpadding="10" cellspacing="0" style="width:100%; border-collapse:collapse; border:1px solid #D7DED9; font-size:14px; margin-bottom:20px;">
    <thead>
        <tr style="background:#F6FAF7; color:#12372A;">
            <th>Feature</th>
            <th>Skid Steer Loader</th>
            <th>Compact Wheel Loader</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Turning Radius</strong></td>
            <td>Zero-Radius (Spins in place)</td>
            <td>Medium (Articulated center)</td>
        </tr>
        <tr>
            <td><strong>Surface Damage</strong></td>
            <td>High (Tears up grass/turf)</td>
            <td>Low (Rolls smoothly, no scuffing)</td>
        </tr>
        <tr>
            <td><strong>Traveling Speed</strong></td>
            <td>Slow (7 - 12 mph)</td>
            <td>Fast (12 - 20 mph)</td>
        </tr>
        <tr>
            <td><strong>Tire Lifespan</strong></td>
            <td>300 - 500 Operating Hours</td>
            <td>1,500 - 2,000+ Operating Hours</td>
        </tr>
        <tr>
            <td><strong>Fuel Efficiency</strong></td>
            <td>Moderate (High steering drag)</td>
            <td>Excellent (Low rolling resistance)</td>
        </tr>
        <tr>
            <td><strong>Visibility</strong></td>
            <td>Restricted (Low cab, side arms)</td>
            <td>Superb (Elevated 360-degree glass)</td>
        </tr>
    </tbody>
</table>

<h3>Final Decision Guide</h3>
<p>Choose a <strong>Skid Steer</strong> if you work in extremely confined spaces, need to change between many specialized attachments, and regularly work on soft dirt where tire wear is less of a factor.
Choose a <strong>Wheel Loader</strong> if your work is centered on bulk material loading, carrying gravel across large sites, working on finished turf or concrete, and you want to minimize ongoing fuel and tire replacement costs.</p>',
                'is_featured' => false,
                'status' => 'published',
                'published_at' => now()->subDays(2),
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}
