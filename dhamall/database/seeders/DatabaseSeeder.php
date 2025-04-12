<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AddressSeeder::class,
            CategoriesSeeder::class,
            SubscriptionsSeeder::class,
            UserSeeder::class,
            SellerShopsSeeder::class,
            FeedbackSeeder::class,
            ContactUsSeeder::class,
            ReturnsAndRefundsSeeder::class,
            FaqsSeeder::class,
            AboutUsSeeder::class,
            ShippingPolicySeeder::class,
            TermsAndConditionsSeeder::class,
            PrivacyPolicySeeder::class,
            ShippingSeeder::class,
            BrandsSeeder::class,
            OrdersSeeder::class,
            ProductsSeeder::class,
            ProductImagesSeeder::class,
            ProductReviewsSeeder::class,
            OrderItemsSeeder::class,
            WishlistSeeder::class,
            CartSeeder::class,
            WishlistItemsSeeder::class,
            CartItemsSeeder::class,
            NotificationsSeeder::class,
            PaymentDetailsSeeder::class,
            BuyerCheckoutDetailsSeeder::class,
            UserImagesSeeder::class,
            SellerShopRequestsSeeder::class,



            // Ensure this line is included
        ]);
    }
}
