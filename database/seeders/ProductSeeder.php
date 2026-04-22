<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
Product::truncate();
\DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $products = [

            // =====================
            // FASHION (20 products)
            // =====================
            ['name' => 'Men\'s Casual T-Shirt', 'category' => 'Fashion', 'description' => 'Premium cotton casual t-shirt available in multiple colors. Perfect for everyday wear.', 'price' => 899, 'stock' => 50, 'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=500'],
            ['name' => 'Women\'s Summer Dress', 'category' => 'Fashion', 'description' => 'Elegant floral summer dress made from lightweight breathable fabric.', 'price' => 2499, 'stock' => 30, 'image' => 'https://images.unsplash.com/photo-1572804013427-4d7ca7268217?w=500'],
            ['name' => 'Men\'s Slim Fit Jeans', 'category' => 'Fashion', 'description' => 'Classic slim fit denim jeans with stretch comfort fabric.', 'price' => 2999, 'stock' => 40, 'image' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?w=500'],
            ['name' => 'Women\'s Handbag', 'category' => 'Fashion', 'description' => 'Stylish leather handbag with multiple compartments and gold hardware.', 'price' => 3499, 'stock' => 25, 'image' => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=500'],
            ['name' => 'Men\'s Formal Shirt', 'category' => 'Fashion', 'description' => 'Crisp formal shirt perfect for office and business meetings.', 'price' => 1799, 'stock' => 35, 'image' => 'https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=500'],
            ['name' => 'Men\'s Leather Wallet', 'category' => 'Fashion', 'description' => 'Genuine leather slim wallet with card slots and coin pocket.', 'price' => 1299, 'stock' => 60, 'image' => 'https://images.unsplash.com/photo-1627123424574-724758594e93?w=500'],
            ['name' => 'Winter Hoodie', 'category' => 'Fashion', 'description' => 'Warm and cozy fleece hoodie perfect for cold weather.', 'price' => 2199, 'stock' => 45, 'image' => 'products/hoodie.jpg'],
            ['name' => 'Women\'s Scarf', 'category' => 'Fashion', 'description' => 'Soft silk scarf with beautiful floral prints.', 'price' => 799, 'stock' => 55, 'image' => 'products/scarf.jpg'],
            ['name' => 'Men\'s Sports Cap', 'category' => 'Fashion', 'description' => 'Adjustable sports cap with UV protection.', 'price' => 699, 'stock' => 70, 'image' => 'https://images.unsplash.com/photo-1588850561407-ed78c282e89b?w=500'],
            ['name' => 'Women\'s Denim Jacket', 'category' => 'Fashion', 'description' => 'Classic denim jacket with button front and chest pockets.', 'price' => 3299, 'stock' => 26, 'image' => 'products/denim-jacket.jpg'],
            ['name' => 'Women\'s Sneakers', 'category' => 'Fashion', 'description' => 'Trendy white sneakers with cushioned sole for all day comfort.', 'price' => 3999, 'stock' => 20, 'image' => 'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=500'],
            ['name' => 'Men\'s Chino Pants', 'category' => 'Fashion', 'description' => 'Stylish slim fit chino pants perfect for casual and semi formal occasions.', 'price' => 2299, 'stock' => 38, 'image' => 'https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=500'],
            ['name' => 'Women\'s Maxi Skirt', 'category' => 'Fashion', 'description' => 'Flowy boho style maxi skirt with elastic waistband.', 'price' => 1899, 'stock' => 28, 'image' => 'https://images.unsplash.com/photo-1583496661160-fb5886a0aaaa?w=500'],
            ['name' => 'Men\'s Bomber Jacket', 'category' => 'Fashion', 'description' => 'Trendy bomber jacket with ribbed cuffs and zip pockets.', 'price' => 4499, 'stock' => 22, 'image' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=500'],
            ['name' => 'Women\'s Blazer', 'category' => 'Fashion', 'description' => 'Classic tailored blazer perfect for office and formal events.', 'price' => 3799, 'stock' => 18, 'image' => 'products/blazer.jpg'],
            ['name' => 'Unisex Sunglasses', 'category' => 'Fashion', 'description' => 'Stylish UV400 protected sunglasses suitable for all face shapes.', 'price' => 1299, 'stock' => 50, 'image' => 'https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=500'],
            ['name' => 'Men\'s Polo Shirt', 'category' => 'Fashion', 'description' => 'Classic pique polo shirt available in 8 colors.', 'price' => 1499, 'stock' => 42, 'image' => 'https://images.unsplash.com/photo-1586363104862-3a5e2ab60d99?w=500'],
            ['name' => 'Women\'s Cardigan', 'category' => 'Fashion', 'description' => 'Soft knitted cardigan perfect for layering in cooler weather.', 'price' => 2699, 'stock' => 32, 'image' => 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=500'],
            ['name' => 'Men\'s Running Shorts', 'category' => 'Fashion', 'description' => 'Lightweight quick dry running shorts with inner liner.', 'price' => 999, 'stock' => 55, 'image' => 'https://images.unsplash.com/photo-1539185441755-769473a23570?w=500'],
            ['name' => 'Leather Belt', 'category' => 'Fashion', 'description' => 'Premium genuine leather belt with silver buckle for men and women.', 'price' => 899, 'stock' => 65, 'image' => 'products/belt.jpg'],

            // =====================
            // ELECTRONICS (10 products)
            // =====================
            ['name' => 'Wireless Headphones', 'category' => 'Electronics', 'description' => 'Premium noise cancelling wireless headphones with 30 hour battery life.', 'price' => 4999, 'stock' => 25, 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500'],
            ['name' => 'Smart Watch', 'category' => 'Electronics', 'description' => 'Feature packed smart watch with health tracking and GPS.', 'price' => 2999, 'stock' => 15, 'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=500'],
            ['name' => 'Bluetooth Speaker', 'category' => 'Electronics', 'description' => 'Portable waterproof bluetooth speaker with 360 degree surround sound.', 'price' => 3999, 'stock' => 20, 'image' => 'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=500'],
            ['name' => 'Mechanical Keyboard', 'category' => 'Electronics', 'description' => 'Compact RGB mechanical keyboard with tactile switches.', 'price' => 6999, 'stock' => 18, 'image' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=500'],
            ['name' => 'USB-C Hub', 'category' => 'Electronics', 'description' => '7 in 1 USB-C hub with HDMI, USB 3.0 and SD card reader.', 'price' => 2499, 'stock' => 30, 'image' => 'products/usb-hub.jpg'],
            ['name' => 'Laptop Stand', 'category' => 'Electronics', 'description' => 'Adjustable aluminum laptop stand for better posture and cooling.', 'price' => 1999, 'stock' => 35, 'image' => 'products/laptop-stand.jpg'],
            ['name' => 'Wireless Mouse', 'category' => 'Electronics', 'description' => 'Ergonomic silent wireless mouse with long battery life.', 'price' => 1499, 'stock' => 40, 'image' => 'https://images.unsplash.com/photo-1527814050087-3793815479db?w=500'],
            ['name' => 'Power Bank 20000mAh', 'category' => 'Electronics', 'description' => 'High capacity power bank with fast charging and dual USB ports.', 'price' => 3499, 'stock' => 28, 'image' => 'https://images.unsplash.com/photo-1609091839311-d5365f9ff1c5?w=500'],
            ['name' => 'Webcam HD 1080p', 'category' => 'Electronics', 'description' => 'Crystal clear 1080p webcam with built in microphone for video calls.', 'price' => 4499, 'stock' => 22, 'image' => 'products/webcam.jpg'],
            ['name' => 'LED Desk Lamp', 'category' => 'Electronics', 'description' => 'Eye care LED desk lamp with adjustable brightness and USB charging port.', 'price' => 1799, 'stock' => 33, 'image' => 'https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=500'],

            // =====================
            // SPORTS (10 products)
            // =====================
            ['name' => 'Running Shoes', 'category' => 'Sports', 'description' => 'Lightweight running shoes with extra cushioning for long distance runs.', 'price' => 3499, 'stock' => 40, 'image' => 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=500'],
            ['name' => 'Yoga Mat', 'category' => 'Sports', 'description' => 'Non slip premium yoga mat with alignment lines and carrying strap.', 'price' => 1299, 'stock' => 50, 'image' => 'https://images.unsplash.com/photo-1592432678016-e910b452f9a2?w=500'],
            ['name' => 'Dumbbell Set', 'category' => 'Sports', 'description' => 'Adjustable dumbbell set ranging from 2kg to 10kg for home workouts.', 'price' => 5999, 'stock' => 20, 'image' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=500'],
            ['name' => 'Sports Water Bottle', 'category' => 'Sports', 'description' => 'Insulated stainless steel water bottle keeps drinks cold for 24 hours.', 'price' => 999, 'stock' => 60, 'image' => 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?w=500'],
            ['name' => 'Resistance Bands Set', 'category' => 'Sports', 'description' => 'Set of 5 resistance bands for strength training and stretching.', 'price' => 1499, 'stock' => 45, 'image' => 'products/resistance-bands.jpg'],
            ['name' => 'Football', 'category' => 'Sports', 'description' => 'Official size and weight football for training and matches.', 'price' => 1999, 'stock' => 30, 'image' => 'https://images.unsplash.com/photo-1575361204480-aadea25e6e68?w=500'],
            ['name' => 'Cycling Helmet', 'category' => 'Sports', 'description' => 'Lightweight aerodynamic cycling helmet with ventilation system.', 'price' => 2799, 'stock' => 25, 'image' => 'products/cycling-helmet.jpg'],
            ['name' => 'Skipping Rope', 'category' => 'Sports', 'description' => 'Adjustable speed skipping rope with ball bearings for smooth rotation.', 'price' => 799, 'stock' => 55, 'image' => 'products/skipping-rope.jpg'],
            ['name' => 'Cricket Bat', 'category' => 'Sports', 'description' => 'Professional grade English willow cricket bat for serious players.', 'price' => 4999, 'stock' => 18, 'image' => 'products/cricket-bat.jpg'],
            ['name' => 'Gym Gloves', 'category' => 'Sports', 'description' => 'Anti slip gym gloves with wrist support for weightlifting.', 'price' => 899, 'stock' => 48, 'image' => 'products/gym-gloves.jpg'],

            // =====================
            // HOME & KITCHEN (10 products)
            // =====================
            ['name' => 'Coffee Maker', 'category' => 'Home & Kitchen', 'description' => 'Automatic drip coffee maker with programmable timer and keep warm function.', 'price' => 8999, 'stock' => 15, 'image' => 'products/coffee-maker.jpg'],
            ['name' => 'Non Stick Pan Set', 'category' => 'Home & Kitchen', 'description' => 'Premium 3 piece non stick cookware set with glass lids.', 'price' => 4499, 'stock' => 20, 'image' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=500'],
            ['name' => 'Air Fryer', 'category' => 'Home & Kitchen', 'description' => '5 litre digital air fryer with 8 preset cooking programs.', 'price' => 11999, 'stock' => 12, 'image' => 'products/air-fryer.jpg'],
            ['name' => 'Blender', 'category' => 'Home & Kitchen', 'description' => 'High speed blender for smoothies, soups and sauces.', 'price' => 6499, 'stock' => 18, 'image' => 'https://images.unsplash.com/photo-1570222094114-d054a817e56b?w=500'],
            ['name' => 'Ceramic Dinner Set', 'category' => 'Home & Kitchen', 'description' => '12 piece ceramic dinner set with plates, bowls and mugs.', 'price' => 3999, 'stock' => 22, 'image' => 'https://images.unsplash.com/photo-1603199506016-b9a594b593c0?w=500'],
            ['name' => 'Knife Set', 'category' => 'Home & Kitchen', 'description' => 'Professional 6 piece stainless steel knife set with wooden block.', 'price' => 5499, 'stock' => 16, 'image' => 'https://images.unsplash.com/photo-1593618998160-e34014e67546?w=500'],
            ['name' => 'Scented Candles Pack', 'category' => 'Home & Kitchen', 'description' => 'Set of 6 premium scented candles in relaxing lavender and vanilla.', 'price' => 1499, 'stock' => 40, 'image' => 'products/candles.jpg'],
            ['name' => 'Electric Kettle', 'category' => 'Home & Kitchen', 'description' => 'Fast boiling 1.7L electric kettle with auto shutoff and temperature control.', 'price' => 3499, 'stock' => 25, 'image' => 'products/electric-kettle.jpg'],
            ['name' => 'Toaster Oven', 'category' => 'Home & Kitchen', 'description' => 'Compact toaster oven with 4 slice capacity and multiple cooking modes.', 'price' => 7999, 'stock' => 14, 'image' => 'products/toaster-oven.jpg'],
            ['name' => 'Vacuum Cleaner', 'category' => 'Home & Kitchen', 'description' => 'Powerful cordless vacuum cleaner with HEPA filter and 45 min battery.', 'price' => 14999, 'stock' => 10, 'image' => 'products/vacuum-cleaner.jpg'],

            // =====================
            // BEAUTY (15 products)
            // =====================
            ['name' => 'Skincare Gift Set', 'category' => 'Beauty', 'description' => 'Complete skincare set with cleanser, toner, serum and moisturizer.', 'price' => 3999, 'stock' => 25, 'image' => 'products/skincare.jpg'],
            ['name' => 'Perfume - Rose Gold', 'category' => 'Beauty', 'description' => 'Long lasting floral perfume with notes of rose, jasmine and musk.', 'price' => 4999, 'stock' => 20, 'image' => 'products/perfume.jpg'],
            ['name' => 'Lipstick Collection', 'category' => 'Beauty', 'description' => 'Set of 6 long lasting matte lipsticks in trendy shades.', 'price' => 1999, 'stock' => 35, 'image' => 'products/lipstick.jpg'],
            ['name' => 'Hair Dryer Pro', 'category' => 'Beauty', 'description' => 'Professional ionic hair dryer with diffuser and concentrator attachments.', 'price' => 5999, 'stock' => 18, 'image' => 'https://images.unsplash.com/photo-1522338140262-f46f5913618a?w=500'],
            ['name' => 'Face Mask Set', 'category' => 'Beauty', 'description' => 'Pack of 10 hydrating sheet face masks with different ingredients.', 'price' => 1299, 'stock' => 50, 'image' => 'products/face-mask.jpg'],
            ['name' => 'Eyeshadow Palette', 'category' => 'Beauty', 'description' => '18 color eyeshadow palette with matte and shimmer shades.', 'price' => 2499, 'stock' => 30, 'image' => 'https://images.unsplash.com/photo-1512496015851-a90fb38ba796?w=500'],
            ['name' => 'Nail Polish Set', 'category' => 'Beauty', 'description' => 'Set of 12 long lasting nail polishes in trendy seasonal colors.', 'price' => 1499, 'stock' => 45, 'image' => 'products/nail-polish.jpg'],
            ['name' => 'Facial Cleanser', 'category' => 'Beauty', 'description' => 'Gentle foaming facial cleanser suitable for all skin types.', 'price' => 899, 'stock' => 55, 'image' => 'https://images.unsplash.com/photo-1556228578-0d85b1a4d571?w=500'],
            ['name' => 'Vitamin C Serum', 'category' => 'Beauty', 'description' => 'Brightening vitamin C serum that reduces dark spots and evens skin tone.', 'price' => 2299, 'stock' => 40, 'image' => 'products/serum.jpg'],
            ['name' => 'Makeup Brush Set', 'category' => 'Beauty', 'description' => 'Professional 12 piece makeup brush set with carrying case.', 'price' => 1799, 'stock' => 35, 'image' => 'products/makeup-brush.jpg'],
            ['name' => 'Sunscreen SPF 50', 'category' => 'Beauty', 'description' => 'Lightweight non greasy sunscreen with SPF 50 protection.', 'price' => 1199, 'stock' => 60, 'image' => 'products/sunscreen.jpg'],
            ['name' => 'Rose Water Toner', 'category' => 'Beauty', 'description' => 'Pure rose water toner that hydrates and refreshes skin.', 'price' => 799, 'stock' => 65, 'image' => 'products/rose-toner.jpg'],
            ['name' => 'Eyeliner Pen', 'category' => 'Beauty', 'description' => 'Waterproof liquid eyeliner pen for precise and long lasting lines.', 'price' => 699, 'stock' => 70, 'image' => 'products/eyeliner.jpg'],
            ['name' => 'Moisturizing Cream', 'category' => 'Beauty', 'description' => 'Rich moisturizing cream with hyaluronic acid and shea butter.', 'price' => 1599, 'stock' => 48, 'image' => 'https://images.unsplash.com/photo-1598440947619-2c35fc9aa908?w=500'],
            ['name' => 'Compact Powder', 'category' => 'Beauty', 'description' => 'Silky smooth compact powder for a flawless matte finish.', 'price' => 1299, 'stock' => 42, 'image' => 'products/compact-powder.jpg'],

            // =====================
            // BOOKS (10 products)
            // =====================
            ['name' => 'Harry Potter - Philosopher\'s Stone', 'category' => 'Books', 'description' => 'The magical first book of J.K. Rowling\'s beloved Harry Potter series.', 'price' => 1299, 'stock' => 40, 'image' => 'products/harry-potter.jpg'],
            ['name' => 'The Great Gatsby', 'category' => 'Books', 'description' => 'F. Scott Fitzgerald\'s classic tale of wealth, love and the American Dream.', 'price' => 899, 'stock' => 35, 'image' => 'products/great-gatsby.jpg'],
            ['name' => 'To Kill a Mockingbird', 'category' => 'Books', 'description' => 'Harper Lee\'s Pulitzer Prize winning novel about justice and racial inequality.', 'price' => 999, 'stock' => 30, 'image' => 'products/mockingbird.jpg'],
            ['name' => 'The Notebook', 'category' => 'Books', 'description' => 'Nicholas Sparks\' heartwarming love story that became a beloved film.', 'price' => 1099, 'stock' => 45, 'image' => 'products/notebook.jpg'],
            ['name' => 'Pride and Prejudice', 'category' => 'Books', 'description' => 'Jane Austen\'s timeless romantic novel about love, class and society.', 'price' => 799, 'stock' => 38, 'image' => 'products/pride-prejudice.jpg'],
            ['name' => 'The Lord of the Rings', 'category' => 'Books', 'description' => 'J.R.R. Tolkien\'s epic fantasy adventure in Middle Earth.', 'price' => 2499, 'stock' => 25, 'image' => 'products/lord-rings.jpg'],
            ['name' => 'Gone Girl', 'category' => 'Books', 'description' => 'Gillian Flynn\'s thrilling psychological mystery about a missing wife.', 'price' => 1199, 'stock' => 32, 'image' => 'products/gone-girl.jpg'],
            ['name' => 'The Da Vinci Code', 'category' => 'Books', 'description' => 'Dan Brown\'s gripping mystery thriller involving secret societies and art.', 'price' => 1299, 'stock' => 42, 'image' => 'products/da-vinci.jpg'],
            ['name' => 'Sherlock Holmes Collection', 'category' => 'Books', 'description' => 'Complete collection of Arthur Conan Doyle\'s legendary detective stories.', 'price' => 1899, 'stock' => 28, 'image' => 'products/sherlock.jpg'],
            ['name' => 'The Hunger Games', 'category' => 'Books', 'description' => 'Suzanne Collins\' dystopian survival story set in a future totalitarian world.', 'price' => 1399, 'stock' => 36, 'image' => 'products/hunger-games.jpg'],

            // =====================
            // TOYS (10 products)
            // =====================
            ['name' => 'LEGO Classic Set', 'category' => 'Toys', 'description' => '500 piece LEGO classic brick set for creative building.', 'price' => 3499, 'stock' => 22, 'image' => 'https://images.unsplash.com/photo-1587654780291-39c9404d746b?w=500'],
            ['name' => 'Remote Control Car', 'category' => 'Toys', 'description' => 'High speed remote control car with 4WD and rechargeable battery.', 'price' => 2999, 'stock' => 18, 'image' => 'https://images.unsplash.com/photo-1594736797933-d0501ba2fe65?w=500'],
            ['name' => 'Board Game - Monopoly', 'category' => 'Toys', 'description' => 'Classic Monopoly board game for family fun nights.', 'price' => 2499, 'stock' => 25, 'image' => 'https://images.unsplash.com/photo-1611996575749-79a3a250f948?w=500'],
            ['name' => 'Stuffed Teddy Bear', 'category' => 'Toys', 'description' => 'Super soft and huggable teddy bear available in 3 sizes.', 'price' => 1499, 'stock' => 30, 'image' => 'https://images.unsplash.com/photo-1559715541-5daf8a0296d0?w=500'],
            ['name' => 'Rubik\'s Cube', 'category' => 'Toys', 'description' => 'Classic 3x3 Rubik\'s cube with smooth rotation for all skill levels.', 'price' => 699, 'stock' => 55, 'image' => 'products/rubiks-cube.jpg'],
            ['name' => 'Wooden Puzzle 1000pc', 'category' => 'Toys', 'description' => '1000 piece wooden jigsaw puzzle with beautiful landscape design.', 'price' => 1999, 'stock' => 20, 'image' => 'products/puzzle.jpg'],
            ['name' => 'Play-Doh Set', 'category' => 'Toys', 'description' => 'Creative Play-Doh set with 20 colors and molding tools for kids.', 'price' => 1299, 'stock' => 35, 'image' => 'products/playdoh.jpg'],
            ['name' => 'Drone Mini', 'category' => 'Toys', 'description' => 'Easy to fly mini drone with HD camera and 20 min flight time.', 'price' => 5999, 'stock' => 15, 'image' => 'https://images.unsplash.com/photo-1473968512647-3e447244af8f?w=500'],
            ['name' => 'Card Game - UNO', 'category' => 'Toys', 'description' => 'Classic UNO card game for 2 to 10 players. Fun for all ages.', 'price' => 799, 'stock' => 60, 'image' => 'products/uno.jpg'],
            ['name' => 'Action Figure Set', 'category' => 'Toys', 'description' => 'Set of 6 detailed action figures with accessories and display stand.', 'price' => 2299, 'stock' => 22, 'image' => 'https://images.unsplash.com/photo-1558060370-d644479cb6f7?w=500'],

            // =====================
            // FOOD & DRINKS (10 products)
            // =====================
            ['name' => 'Organic Green Tea', 'category' => 'Food & Drinks', 'description' => 'Premium organic green tea from Japanese farms. 100 tea bags.', 'price' => 1199, 'stock' => 55, 'image' => 'products/green-tea.jpg'],
            ['name' => 'Protein Powder', 'category' => 'Food & Drinks', 'description' => 'Whey protein powder with 25g protein per serving in chocolate flavor.', 'price' => 4999, 'stock' => 30, 'image' => 'https://images.unsplash.com/photo-1593095948071-474c5cc2989d?w=500'],
            ['name' => 'Mixed Nuts Pack', 'category' => 'Food & Drinks', 'description' => 'Premium roasted mixed nuts including almonds, cashews and walnuts.', 'price' => 1799, 'stock' => 40, 'image' => 'https://images.unsplash.com/photo-1599599810769-bcde5a160d32?w=500'],
            ['name' => 'Honey - Pure Natural', 'category' => 'Food & Drinks', 'description' => '100% pure natural honey directly sourced from local farms.', 'price' => 899, 'stock' => 50, 'image' => 'https://images.unsplash.com/photo-1558642452-9d2a7deb7f62?w=500'],
            ['name' => 'Dark Chocolate Box', 'category' => 'Food & Drinks', 'description' => 'Luxury dark chocolate box with 70% cocoa and assorted flavors.', 'price' => 1499, 'stock' => 35, 'image' => 'https://images.unsplash.com/photo-1481391319762-47dff72954d9?w=500'],
            ['name' => 'Instant Oatmeal Pack', 'category' => 'Food & Drinks', 'description' => 'Healthy instant oatmeal in 6 delicious flavors. Ready in 2 minutes.', 'price' => 899, 'stock' => 45, 'image' => 'products/oatmeal.jpg'],
            ['name' => 'Coffee Beans Premium', 'category' => 'Food & Drinks', 'description' => 'Single origin premium arabica coffee beans with rich bold flavor.', 'price' => 2499, 'stock' => 28, 'image' => 'products/coffee-beans.jpg'],
            ['name' => 'Dried Fruits Mix', 'category' => 'Food & Drinks', 'description' => 'Healthy mix of dried apricots, raisins, cranberries and dates.', 'price' => 1299, 'stock' => 42, 'image' => 'products/dried-fruits.jpg'],
            ['name' => 'Herbal Tea Collection', 'category' => 'Food & Drinks', 'description' => 'Collection of 6 premium herbal teas including chamomile and peppermint.', 'price' => 1599, 'stock' => 38, 'image' => 'products/herbal-tea.jpg'],
            ['name' => 'Granola Bars Pack', 'category' => 'Food & Drinks', 'description' => 'Pack of 12 healthy granola bars with oats, honey and mixed nuts.', 'price' => 1099, 'stock' => 50, 'image' => 'products/granola-bars.jpg'],

            // =====================
            // JEWELRY & ACCESSORIES (10 products)
            // =====================
            ['name' => 'Gold Hoop Earrings', 'category' => 'Jewelry & Accessories', 'description' => 'Elegant 18k gold plated hoop earrings perfect for any occasion.', 'price' => 1999, 'stock' => 35, 'image' => 'products/hoop-earrings.jpg'],
            ['name' => 'Pearl Necklace', 'category' => 'Jewelry & Accessories', 'description' => 'Classic freshwater pearl necklace with silver clasp.', 'price' => 3499, 'stock' => 20, 'image' => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=500'],
            ['name' => 'Diamond Ring', 'category' => 'Jewelry & Accessories', 'description' => 'Stunning cubic zirconia diamond ring in silver setting.', 'price' => 2999, 'stock' => 25, 'image' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=500'],
            ['name' => 'Charm Bracelet', 'category' => 'Jewelry & Accessories', 'description' => 'Delicate gold charm bracelet with heart and star charms.', 'price' => 999, 'stock' => 40, 'image' => 'products/charm-bracelet.jpg'],
            ['name' => 'Statement Necklace', 'category' => 'Jewelry & Accessories', 'description' => 'Bold colorful statement necklace to elevate any outfit.', 'price' => 2199, 'stock' => 28, 'image' => 'products/statement-necklace.jpg'],
            ['name' => 'Hair Clips Set', 'category' => 'Jewelry & Accessories', 'description' => 'Set of 10 trendy hair clips in assorted colors and designs.', 'price' => 799, 'stock' => 60, 'image' => 'products/hair-clips.jpg'],
            ['name' => 'Stud Earrings Set', 'category' => 'Jewelry & Accessories', 'description' => 'Set of 6 pairs of dainty stud earrings in gold and silver.', 'price' => 1299, 'stock' => 45, 'image' => 'products/stud-earrings.jpg'],
            ['name' => 'Ankle Bracelet', 'category' => 'Jewelry & Accessories', 'description' => 'Delicate gold anklet with tiny star and moon charms.', 'price' => 999, 'stock' => 50, 'image' => 'products/anklet.jpg'],
            ['name' => 'Silk Scrunchies Pack', 'category' => 'Jewelry & Accessories', 'description' => 'Pack of 5 silk scrunchies in pastel colors. Gentle on hair.', 'price' => 699, 'stock' => 70, 'image' => 'products/scrunchies.jpg'],
            ['name' => 'Layered Necklace Set', 'category' => 'Jewelry & Accessories', 'description' => 'Set of 3 layered gold necklaces with different lengths and pendants.', 'price' => 2499, 'stock' => 30, 'image' => 'products/layered-necklace.jpg'],

            // =====================
            // HAIR CARE (10 products)
            // =====================
            ['name' => 'Argan Oil Hair Serum', 'category' => 'Hair Care', 'description' => 'Lightweight argan oil serum for frizz control and shine enhancement.', 'price' => 1499, 'stock' => 45, 'image' => 'products/argan-serum.jpg'],
            ['name' => 'Keratin Shampoo', 'category' => 'Hair Care', 'description' => 'Sulfate free keratin shampoo for smooth and manageable hair.', 'price' => 1299, 'stock' => 50, 'image' => 'products/keratin-shampoo.jpg'],
            ['name' => 'Deep Conditioning Mask', 'category' => 'Hair Care', 'description' => 'Intensive deep conditioning hair mask with coconut oil and keratin.', 'price' => 1799, 'stock' => 38, 'image' => 'https://images.unsplash.com/photo-1535585209827-a15fcdbc4c2d?w=500'],
            ['name' => 'Hair Growth Oil', 'category' => 'Hair Care', 'description' => 'Natural hair growth oil blend with castor, rosemary and peppermint oils.', 'price' => 1999, 'stock' => 35, 'image' => 'products/hair-oil.jpg'],
            ['name' => 'Wooden Hair Brush', 'category' => 'Hair Care', 'description' => 'Natural wooden paddle brush with boar bristles for smooth and shiny hair.', 'price' => 899, 'stock' => 55, 'image' => 'products/hair-brush.jpg'],
            ['name' => 'Hair Straightener', 'category' => 'Hair Care', 'description' => 'Ceramic plate hair straightener with adjustable temperature and fast heat up.', 'price' => 4999, 'stock' => 20, 'image' => 'products/straightener.jpg'],
            ['name' => 'Dry Shampoo Spray', 'category' => 'Hair Care', 'description' => 'Instant refresh dry shampoo spray that absorbs oil and adds volume.', 'price' => 999, 'stock' => 48, 'image' => 'products/dry-shampoo.jpg'],
            ['name' => 'Hair Curler Wand', 'category' => 'Hair Care', 'description' => 'Professional ceramic curling wand for bouncy long lasting curls.', 'price' => 3999, 'stock' => 22, 'image' => 'products/curler.jpg'],
            ['name' => 'Leave In Conditioner', 'category' => 'Hair Care', 'description' => 'Lightweight leave in conditioner that detangles and moisturizes hair.', 'price' => 1199, 'stock' => 42, 'image' => 'products/leave-in.jpg'],
            ['name' => 'Hair Vitamin Supplements', 'category' => 'Hair Care', 'description' => 'Biotin and collagen hair growth vitamins for stronger thicker hair.', 'price' => 2499, 'stock' => 30, 'image' => 'products/hair-vitamins.jpg'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}