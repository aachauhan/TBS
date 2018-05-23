-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2018 at 01:10 PM
-- Server version: 5.5.58-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amasyn_shoeannex`
--
CREATE DATABASE IF NOT EXISTS `amasyn_shoeannex` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `amasyn_shoeannex`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`) VALUES
(1, 'user', 'pass'),
(2, 'jdhoopes', 'biotech100');

-- --------------------------------------------------------

--
-- Table structure for table `amazon_fulfillment_order_reports`
--

CREATE TABLE `amazon_fulfillment_order_reports` (
  `amazon-order-id` varchar(30) NOT NULL,
  `merchant-order-id` varchar(30) DEFAULT NULL,
  `shipment-id` varchar(30) DEFAULT NULL,
  `shipment-item-id` varchar(30) DEFAULT NULL,
  `amazon-order-item-id` varchar(30) DEFAULT NULL,
  `merchant-order-item-id` varchar(30) DEFAULT NULL,
  `purchase-date` timestamp NULL DEFAULT NULL,
  `payments-date` timestamp NULL DEFAULT NULL,
  `shipment-date` timestamp NULL DEFAULT NULL,
  `reporting-date` timestamp NULL DEFAULT NULL,
  `buyer-email` varchar(250) DEFAULT NULL,
  `buyer-name` varchar(200) DEFAULT NULL,
  `buyer-phone-number` varchar(25) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `product-name` varchar(500) DEFAULT NULL,
  `quantity-shipped` int(11) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `item-price` float DEFAULT NULL,
  `item-tax` float DEFAULT NULL,
  `shipping-price` float DEFAULT NULL,
  `shipping-tax` float DEFAULT NULL,
  `gift-wrap-price` float DEFAULT NULL,
  `gift-wrap-tax` float DEFAULT NULL,
  `ship-service-level` varchar(30) DEFAULT NULL,
  `recipient-name` varchar(200) DEFAULT NULL,
  `ship-address-1` varchar(200) DEFAULT NULL,
  `ship-address-2` varchar(200) DEFAULT NULL,
  `ship-address-3` varchar(200) DEFAULT NULL,
  `ship-city` varchar(100) DEFAULT NULL,
  `ship-state` varchar(50) DEFAULT NULL,
  `ship-postal-code` varchar(20) DEFAULT NULL,
  `ship-country` varchar(20) DEFAULT NULL,
  `ship-phone-number` varchar(30) DEFAULT NULL,
  `bill-address-1` varchar(200) DEFAULT NULL,
  `bill-address-2` varchar(200) DEFAULT NULL,
  `bill-address-3` varchar(200) DEFAULT NULL,
  `bill-city` varchar(100) DEFAULT NULL,
  `bill-state` varchar(50) DEFAULT NULL,
  `bill-postal-code` varchar(30) DEFAULT NULL,
  `bill-country` varchar(30) DEFAULT NULL,
  `item-promotion-discount` varchar(10) DEFAULT NULL,
  `ship-promotion-discount` varchar(10) DEFAULT NULL,
  `carrier` varchar(10) DEFAULT NULL,
  `tracking-number` varchar(30) DEFAULT NULL,
  `estimated-arrival-date` varchar(20) DEFAULT NULL,
  `fulfillment-center-id` varchar(10) DEFAULT NULL,
  `fulfillment-channel` varchar(10) DEFAULT NULL,
  `sales-channel` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `amazon_fulfillment_order_reports_sales_velocity`
--

CREATE TABLE `amazon_fulfillment_order_reports_sales_velocity` (
  `Sku` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `sum_of_quantity` int(11) DEFAULT NULL,
  `sales_velocity` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fba_reimbursements`
--

CREATE TABLE `fba_reimbursements` (
  `date` date NOT NULL,
  `reimbursement_id` varchar(45) NOT NULL,
  `case_id` varchar(45) DEFAULT NULL,
  `order_id` varchar(45) DEFAULT NULL,
  `reason` varchar(90) DEFAULT NULL,
  `sku` varchar(64) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `fn_sku` varchar(64) DEFAULT NULL,
  `asin` varchar(10) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `item_condition` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount_per_unit` decimal(10,2) DEFAULT NULL,
  `amount_total` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `fba_reimbursements_view`
-- (See below for the actual view)
--
CREATE TABLE `fba_reimbursements_view` (
`sku` varchar(64)
,`reimbursements` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `fba_shipments_details`
--

CREATE TABLE `fba_shipments_details` (
  `shipment_date` date DEFAULT NULL,
  `shipment_name` varchar(128) DEFAULT NULL,
  `shipment_id` varchar(45) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `SKUs` text,
  `shipped` int(11) DEFAULT NULL,
  `received` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `fba_shipments_details_view`
-- (See below for the actual view)
--
CREATE TABLE `fba_shipments_details_view` (
`shipment_date` date
,`shipment_name` varchar(128)
,`shipment_id` varchar(45)
,`status` varchar(45)
,`SKUs` text
,`shipped` int(11)
,`received` int(11)
,`sku_table_shipped` decimal(32,0)
,`sku_table_received` decimal(32,0)
,`shipped_discrepancy` decimal(33,0)
,`received_discrepancy` decimal(33,0)
,`warning` varchar(7)
);

-- --------------------------------------------------------

--
-- Table structure for table `fba_shipments_new`
--

CREATE TABLE `fba_shipments_new` (
  `shipment_date` date DEFAULT NULL,
  `shipment_name` varchar(128) DEFAULT NULL,
  `shipment_id` varchar(45) NOT NULL,
  `sku` varchar(64) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `shipped` int(11) DEFAULT NULL,
  `received` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `fba_shipments_new_view`
-- (See below for the actual view)
--
CREATE TABLE `fba_shipments_new_view` (
`sku` varchar(64)
,`cumulative_shipped` decimal(32,0)
,`cumulative_received` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `fba_shipments_report`
-- (See below for the actual view)
--
CREATE TABLE `fba_shipments_report` (
`sku` varchar(64)
,`cumulative_shipped` decimal(32,0)
,`cumulative_received` decimal(32,0)
,`units_sold` decimal(32,0)
,`units_sold_last_28_days` decimal(32,0)
,`sales_velocity` int(11)
,`sales_velocity_amazon_FF_orders` int(11)
,`reimbursements` bigint(21)
,`quantity_unsold` decimal(34,0)
,`wholesale_price` varchar(100)
,`inventory_value` double
,`asin` text
,`product_name` text
,`supplier` varchar(100)
,`last_sold_date` date
,`last_sold_price` decimal(10,2)
,`last_sold_profit` varchar(10)
,`status` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `Inventory_All`
--

CREATE TABLE `Inventory_All` (
  `id` int(10) NOT NULL,
  `item_name` text COLLATE utf8_unicode_ci NOT NULL,
  `item_description` text COLLATE utf8_unicode_ci NOT NULL,
  `listing_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `seller_sku` varchar(64) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `price` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(10) NOT NULL,
  `open_date` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` text COLLATE utf8_unicode_ci NOT NULL,
  `item_is_marketplace` enum('y','n') COLLATE utf8_unicode_ci NOT NULL,
  `product_id_type` int(5) NOT NULL,
  `zshop_shipping_fee` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `item_note` text COLLATE utf8_unicode_ci NOT NULL,
  `item_condition` int(5) NOT NULL,
  `zshop_category1` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `zshop_browse_path` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `zshop_storefront_feature` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `asin1` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `asin2` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `asin3` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `will_ship_internationally` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `expedited_shipping` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `zshop_boldface` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `bid_for_featured_placement` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `add_delete` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `pending_quantity` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `fulfillment_channel` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `UniqueLock` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `Inventory_All_view`
-- (See below for the actual view)
--
CREATE TABLE `Inventory_All_view` (
`sku` varchar(64)
,`asin1` text
,`asin2` text
,`asin3` text
,`product_name` text
,`asin` varchar(32)
);

-- --------------------------------------------------------

--
-- Table structure for table `Inventory_FBA`
--

CREATE TABLE `Inventory_FBA` (
  `FBA_ID` int(10) NOT NULL,
  `sku` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `fnsku` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `asin` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` text COLLATE utf8_unicode_ci NOT NULL,
  `product_condition` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `your_price` float NOT NULL,
  `mfn_listing_exists` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mfn_fulfillable_quantity` int(5) NOT NULL,
  `afn_listing_exists` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `afn_warehouse_quantity` int(5) NOT NULL,
  `afn_fulfillable_quantity` int(5) NOT NULL,
  `afn_unsellable_quantity` int(5) NOT NULL,
  `afn_reserved_quantity` int(5) NOT NULL,
  `afn_total_quantity` int(5) NOT NULL,
  `per_unit_volume` float NOT NULL,
  `afn_inbound_working_quantity` int(5) NOT NULL,
  `afn_inbound_shipped_quantity` int(5) NOT NULL,
  `afn_inbound_receiving_quantity` int(5) NOT NULL,
  `UniqueLock` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_current` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `Inventory_FBA_view`
-- (See below for the actual view)
--
CREATE TABLE `Inventory_FBA_view` (
`sku` varchar(255)
,`asin` text
,`product_name` text
);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_update`
--

CREATE TABLE `inventory_update` (
  `sku` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `identifier` varchar(50) NOT NULL,
  `database name` varchar(50) NOT NULL,
  `table name` varchar(100) NOT NULL,
  `identifier field` varchar(100) NOT NULL,
  `quantity field` varchar(100) NOT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `leadtime-to-ship` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `multiplier` int(11) NOT NULL DEFAULT '1',
  `Min Price` float(8,2) DEFAULT NULL,
  `Max Price` float(8,2) DEFAULT NULL,
  `Wholesale Price` float(8,2) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `Comment` text,
  `last updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `sku` varchar(64) NOT NULL,
  `asin` varchar(10) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_prices`
--

CREATE TABLE `item_prices` (
  `ASIN` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Item Name` text NOT NULL,
  `Purchase Price` varchar(32) NOT NULL,
  `Shipping Cost` varchar(32) NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `Units in Box` int(5) NOT NULL,
  `Box Size` varchar(32) NOT NULL,
  `Box Weight` varchar(32) NOT NULL,
  `UPC` varchar(64) NOT NULL,
  `Amazon Grams` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_credentials`
--

CREATE TABLE `login_credentials` (
  `user_name` varchar(15) NOT NULL,
  `passcode` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `new_settlement_sku_unitssold`
--

CREATE TABLE `new_settlement_sku_unitssold` (
  `settlement` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `unique_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `units_sold` int(11) NOT NULL,
  `settlement-end-date` date NOT NULL,
  `UniqueLock` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `new_settlement_sku_unitssold_sum`
-- (See below for the actual view)
--
CREATE TABLE `new_settlement_sku_unitssold_sum` (
`unique_id` varchar(50)
,`total of units_sold` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `new_settlement_sku_unitssold_view`
-- (See below for the actual view)
--
CREATE TABLE `new_settlement_sku_unitssold_view` (
`unique_id` varchar(50)
,`units_sold` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `new_settlement_summary`
--

CREATE TABLE `new_settlement_summary` (
  `settlement` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `settlement-end-date` date NOT NULL,
  `UniqueLock` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_settlement_transactions`
--

CREATE TABLE `new_settlement_transactions` (
  `OrderId` varchar(64) NOT NULL,
  `Sku` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Date` date DEFAULT NULL,
  `net_amazon_return` decimal(10,2) DEFAULT NULL,
  `whole_sale_price` decimal(10,2) DEFAULT NULL,
  `profit` varchar(10) DEFAULT NULL,
  `Fulfillment` varchar(32) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `OrderPrincipal` decimal(10,2) DEFAULT NULL,
  `OrderShipping` decimal(10,2) DEFAULT NULL,
  `OrderCommission` decimal(10,2) DEFAULT NULL,
  `OrderFBAPerOrderFulfillmentFee` decimal(10,2) DEFAULT NULL,
  `OrderFBAPerUnitFulfillmentFee` decimal(10,2) DEFAULT NULL,
  `OrderFBAWeightBasedFee` decimal(10,2) DEFAULT NULL,
  `OrderShippingChargeback` decimal(10,2) DEFAULT NULL,
  `OrderSSOF SSS-25Shipping` decimal(10,2) DEFAULT NULL,
  `AdjustmentPrincipal` decimal(10,2) DEFAULT NULL,
  `AdjustmentCommission` decimal(10,2) DEFAULT NULL,
  `AdjustmentRefundCommission` decimal(10,2) DEFAULT NULL,
  `AdjustmentShipping` decimal(10,2) DEFAULT NULL,
  `AdjustmentShippingChargeback` decimal(10,2) DEFAULT NULL,
  `AdjustmentSSOF SSS-25Shipping` decimal(10,2) DEFAULT NULL,
  `UniqueLock` varchar(255) NOT NULL,
  `Date_UTC` datetime DEFAULT NULL,
  `SettlementId` varchar(20) DEFAULT NULL,
  `Brand` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `new_settlement_transactions_last_28_days_view`
-- (See below for the actual view)
--
CREATE TABLE `new_settlement_transactions_last_28_days_view` (
`max_date` date
,`min_date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `new_settlement_transactions_max_date_view`
-- (See below for the actual view)
--
CREATE TABLE `new_settlement_transactions_max_date_view` (
`Date_UTC` datetime
,`Sku` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `new_settlement_transactions_sales_velocity`
--

CREATE TABLE `new_settlement_transactions_sales_velocity` (
  `Sku` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `sum_of_quantity` int(11) DEFAULT NULL,
  `sales_velocity` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `new_settlement_transactions_unitsandrevenues_by_brand`
--

CREATE TABLE `new_settlement_transactions_unitsandrevenues_by_brand` (
  `Brand` varchar(500) NOT NULL,
  `SettlementId` varchar(20) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `net_amazon_return` decimal(10,2) DEFAULT NULL,
  `whole_sale_price` decimal(10,2) DEFAULT NULL,
  `profit` decimal(10,2) DEFAULT NULL,
  `OrderPrincipal` decimal(10,2) DEFAULT NULL,
  `OrderShipping` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `new_settlement_transactions_unitsold_28_days_view`
-- (See below for the actual view)
--
CREATE TABLE `new_settlement_transactions_unitsold_28_days_view` (
`Sku` varchar(255)
,`units_sold_last_28_days` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `new_settlement_transactions_view`
-- (See below for the actual view)
--
CREATE TABLE `new_settlement_transactions_view` (
`sku` varchar(255)
,`Quantity` int(11)
,`last_sold_date` date
,`last_sold_price` decimal(10,2)
,`last_sold_profit` varchar(10)
,`Date_UTC` datetime
,`UniqueLock` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `new_view`
--

CREATE TABLE `new_view` (
  `SKU` varchar(64) CHARACTER SET latin1 NOT NULL,
  `Cumulative_Shipped` decimal(32,0) DEFAULT NULL,
  `Cumulative_Received` decimal(32,0) DEFAULT NULL,
  `Total_units_sold` varbinary(55) NOT NULL DEFAULT '',
  `amount_total` varbinary(34) NOT NULL DEFAULT '',
  `ASIN` varchar(10) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_reports`
--

CREATE TABLE `order_reports` (
  `order-id` varchar(100) NOT NULL,
  `order-item-id` varchar(100) DEFAULT NULL,
  `purchase-date` timestamp NULL DEFAULT NULL,
  `payments-date` timestamp NULL DEFAULT NULL,
  `buyer-email` varchar(250) DEFAULT NULL,
  `buyer-name` varchar(250) DEFAULT NULL,
  `buyer-phone-number` varchar(25) DEFAULT NULL,
  `sku` varchar(250) DEFAULT NULL,
  `product-name` varchar(500) DEFAULT NULL,
  `quantity-purchased` int(11) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `item-price` float(8,2) DEFAULT NULL,
  `item-tax` float(8,2) DEFAULT NULL,
  `shipping-price` float(8,2) DEFAULT NULL,
  `shipping-tax` float(8,2) DEFAULT NULL,
  `ship-service-level` varchar(25) DEFAULT NULL,
  `recipient-name` varchar(250) DEFAULT NULL,
  `ship-address-1` varchar(250) DEFAULT NULL,
  `ship-address-2` varchar(250) DEFAULT NULL,
  `ship-address-3` varchar(250) DEFAULT NULL,
  `ship-city` varchar(250) DEFAULT NULL,
  `ship-state` varchar(150) DEFAULT NULL,
  `ship-postal-code` varchar(30) DEFAULT NULL,
  `ship-country` varchar(10) DEFAULT NULL,
  `ship-phone-number` varchar(30) DEFAULT NULL,
  `tax-location-code` varchar(250) DEFAULT NULL,
  `tax-location-city` varchar(50) DEFAULT NULL,
  `tax-location-county` varchar(50) DEFAULT NULL,
  `tax-location-state` varchar(50) DEFAULT NULL,
  `per-unit-item-taxable-district` varchar(50) DEFAULT NULL,
  `per-unit-item-taxable-city` varchar(50) DEFAULT NULL,
  `per-unit-item-taxable-county` varchar(50) DEFAULT NULL,
  `per-unit-item-taxable-state` varchar(50) DEFAULT NULL,
  `per-unit-item-non-taxable-district` varchar(50) DEFAULT NULL,
  `per-unit-item-non-taxable-city` varchar(50) DEFAULT NULL,
  `per-unit-item-non-taxable-county` varchar(50) DEFAULT NULL,
  `per-unit-item-non-taxable-state` varchar(50) DEFAULT NULL,
  `per-unit-item-zero-rated-district` varchar(50) DEFAULT NULL,
  `per-unit-item-zero-rated-city` varchar(50) DEFAULT NULL,
  `per-unit-item-zero-rated-county` varchar(50) DEFAULT NULL,
  `per-unit-item-zero-rated-state` varchar(50) DEFAULT NULL,
  `per-unit-item-tax-collected-district` varchar(50) DEFAULT NULL,
  `per-unit-item-tax-collected-city` varchar(50) DEFAULT NULL,
  `per-unit-item-tax-collected-county` varchar(50) DEFAULT NULL,
  `per-unit-item-tax-collected-state` varchar(50) DEFAULT NULL,
  `per-unit-shipping-taxable-district` varchar(50) DEFAULT NULL,
  `per-unit-shipping-taxable-city` varchar(50) DEFAULT NULL,
  `per-unit-shipping-taxable-county` varchar(50) DEFAULT NULL,
  `per-unit-shipping-taxable-state` varchar(50) DEFAULT NULL,
  `per-unit-shipping-non-taxable-district` varchar(50) DEFAULT NULL,
  `per-unit-shipping-non-taxable-city` varchar(50) DEFAULT NULL,
  `per-unit-shipping-non-taxable-county` varchar(50) DEFAULT NULL,
  `per-unit-shipping-non-taxable-state` varchar(50) DEFAULT NULL,
  `per-unit-shipping-zero-rated-district` varchar(50) DEFAULT NULL,
  `per-unit-shipping-zero-rated-city` varchar(50) DEFAULT NULL,
  `per-unit-shipping-zero-rated-county` varchar(50) DEFAULT NULL,
  `per-unit-shipping-zero-rated-state` varchar(50) DEFAULT NULL,
  `per-unit-shipping-tax-collected-district` varchar(50) DEFAULT NULL,
  `per-unit-shipping-tax-collected-city` varchar(50) DEFAULT NULL,
  `per-unit-shipping-tax-collected-county` varchar(50) DEFAULT NULL,
  `per-unit-shipping-tax-collected-state` varchar(50) DEFAULT NULL,
  `delivery-start-date` timestamp NULL DEFAULT NULL,
  `delivery-end-date` timestamp NULL DEFAULT NULL,
  `delivery-time-zone` text,
  `delivery-Instructions` text,
  `sales-channel` text,
  `order-channel` text,
  `order-channel-instance` text,
  `external-order-id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `name` varchar(128) NOT NULL,
  `value` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `storefront_orders`
--

CREATE TABLE `storefront_orders` (
  `order_number` bigint(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date_time` datetime NOT NULL,
  `sub_total` double(16,2) NOT NULL,
  `utha_tax` double(16,2) NOT NULL,
  `tax` double(16,2) NOT NULL,
  `whole_percentage_discount` double(16,2) NOT NULL,
  `whole_discount` double(16,2) NOT NULL,
  `total` double(16,2) NOT NULL,
  `payment_type` varchar(10) NOT NULL DEFAULT 'Credit',
  `cc_number` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `cash_owned` double(16,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `storefront_orders_sku`
--

CREATE TABLE `storefront_orders_sku` (
  `order_number` bigint(20) NOT NULL,
  `sku` varchar(250) NOT NULL,
  `title` text NOT NULL,
  `price` double(16,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `percentage_discount` double(16,2) NOT NULL,
  `discount` double(16,2) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_details`
--

CREATE TABLE `store_details` (
  `id` int(11) NOT NULL,
  `SKU` varchar(255) NOT NULL,
  `FNSKU` varchar(50) NOT NULL,
  `ASIN` varchar(50) NOT NULL,
  `UPC` varchar(200) NOT NULL,
  `Price` double(10,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Store` varchar(50) NOT NULL,
  `On Amazon` varchar(6) NOT NULL DEFAULT 'Yes' COMMENT 'Yes, No',
  `Stock Location` varchar(100) NOT NULL,
  `Store SKU` bigint(20) NOT NULL,
  `Title` text NOT NULL,
  `Supplier` varchar(100) NOT NULL,
  `Cost` double NOT NULL,
  `Manual` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 - Manual in checkout 0 - Normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_inbound`
--

CREATE TABLE `store_inbound` (
  `id` int(11) NOT NULL,
  `Shipment ID` int(11) NOT NULL,
  `unique_ID` varchar(100) NOT NULL,
  `Item Number` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL COMMENT 'UPC, FNSKU',
  `Quantity` int(11) NOT NULL,
  `UPC` varchar(200) NOT NULL,
  `FNSKU` varchar(50) NOT NULL,
  `SKU` varchar(255) NOT NULL,
  `Name` text NOT NULL,
  `Price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_inbound_shipment`
--

CREATE TABLE `store_inbound_shipment` (
  `id` int(11) NOT NULL,
  `shipment name` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL COMMENT 'UPC, FNSKU',
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'working' COMMENT 'working, checked in, closed',
  `last_entry` int(11) NOT NULL DEFAULT '6',
  `last_selection` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_outbound`
--

CREATE TABLE `store_outbound` (
  `id` int(11) NOT NULL,
  `Plan_id` int(11) NOT NULL,
  `Shipment ID` varchar(50) NOT NULL,
  `Shipment Name` varchar(255) NOT NULL,
  `Ship To` text NOT NULL,
  `Merchant SKU` varchar(255) NOT NULL,
  `Title` text NOT NULL,
  `ASIN` varchar(50) NOT NULL,
  `FNSKU` varchar(50) NOT NULL,
  `external-id` varchar(50) NOT NULL,
  `Condition` varchar(25) NOT NULL,
  `Shipped` int(11) NOT NULL,
  `Checked in` int(11) NOT NULL,
  `date` date NOT NULL,
  `Units per Case` int(11) NOT NULL,
  `Number of Cases` int(11) NOT NULL,
  `Who will prep?` varchar(255) NOT NULL,
  `Prep Type` varchar(255) NOT NULL,
  `Who will label?` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_outbound_bkp`
--

CREATE TABLE `store_outbound_bkp` (
  `id` int(11) NOT NULL,
  `Shipment ID` varchar(50) NOT NULL,
  `Shipment Name` varchar(255) NOT NULL,
  `Ship To` text NOT NULL,
  `Merchant SKU` varchar(255) NOT NULL,
  `Title` text NOT NULL,
  `ASIN` varchar(50) NOT NULL,
  `FNSKU` varchar(50) NOT NULL,
  `external-id` varchar(50) NOT NULL,
  `Condition` varchar(25) NOT NULL,
  `Shipped` int(11) NOT NULL,
  `Checked in` int(11) NOT NULL,
  `Plan Name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'working' COMMENT 'working, completed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_outbound_plan`
--

CREATE TABLE `store_outbound_plan` (
  `id` int(11) NOT NULL,
  `Plan Name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'working' COMMENT 'working, completed',
  `plandate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `supplier_wholesale_price_view`
-- (See below for the actual view)
--
CREATE TABLE `supplier_wholesale_price_view` (
`sku` varchar(200)
,`wholesale_price` varchar(100)
,`asin` varchar(100)
,`product_name` text
,`supplier` varchar(100)
,`status` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `users_shoeannex`
--

CREATE TABLE `users_shoeannex` (
  `SKU` varchar(60) NOT NULL DEFAULT '',
  `ASIN` varchar(40) NOT NULL,
  `NAME` varchar(70) NOT NULL,
  `PRICE` double NOT NULL,
  `FLOOR` double NOT NULL,
  `CEILING` double NOT NULL,
  `SUPPLIER` varchar(40) NOT NULL,
  `UPC` varchar(40) NOT NULL,
  `MPN` varchar(40) NOT NULL,
  `COST` double NOT NULL,
  `QTY_IN_CASE` int(11) NOT NULL DEFAULT '1',
  `MFN_QTY` int(11) NOT NULL,
  `AFN_FULFILLABLE_QUANTITY` int(11) NOT NULL,
  `IMAGE` blob NOT NULL,
  `FBA` varchar(4) NOT NULL,
  `FNSKU` varchar(12) NOT NULL,
  `FEE_WEIGHT_HANDLING` double NOT NULL,
  `FEE_ORDER_HANDLING` double NOT NULL,
  `PICK_PACK_FEE` double NOT NULL,
  `STORAGE_FEE` double NOT NULL,
  `COMMISION` double NOT NULL,
  `COMMISION_PER` double NOT NULL DEFAULT '0',
  `PROFIT` double NOT NULL,
  `FLOOR_PROFIT` double NOT NULL,
  `CEILING_PROFIT` double NOT NULL,
  `AGM` double NOT NULL,
  `AGM_FLOOR` double NOT NULL,
  `AGM_CEILING` double NOT NULL,
  `COMMENT` blob NOT NULL,
  `AFN_WAREHOUSE_QUANTITY` int(11) NOT NULL,
  `AFN_UNSELLABLE_QUANTITY` int(11) NOT NULL,
  `AFN_RESERVED_QUANTITY` int(11) NOT NULL,
  `AFN_TOTAL_QUANTITY` int(11) NOT NULL,
  `PER_UNIT_VOLUME` float NOT NULL,
  `AFN_INBOUND_WORKING_QUANTITY` int(11) NOT NULL,
  `AFN_INBOUND_SHIPPED_QUANTITY` int(11) NOT NULL,
  `AFN_INBOUND_RECEIVING_QUANTITY` int(11) NOT NULL,
  `SALESRANK` double NOT NULL,
  `MERCHANT` varchar(50) NOT NULL,
  `BUYBOX` varchar(50) NOT NULL,
  `Date_RowInserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `fba_reimbursements_view`
--
DROP TABLE IF EXISTS `fba_reimbursements_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasyn`@`localhost` SQL SECURITY DEFINER VIEW `fba_reimbursements_view`  AS  select `fba_reimbursements`.`sku` AS `sku`,count(`fba_reimbursements`.`reimbursement_id`) AS `reimbursements` from `fba_reimbursements` group by `fba_reimbursements`.`sku` ;

-- --------------------------------------------------------

--
-- Structure for view `fba_shipments_details_view`
--
DROP TABLE IF EXISTS `fba_shipments_details_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasyn`@`localhost` SQL SECURITY DEFINER VIEW `fba_shipments_details_view`  AS  select `fba_details`.`shipment_date` AS `shipment_date`,`fba_details`.`shipment_name` AS `shipment_name`,`fba_details`.`shipment_id` AS `shipment_id`,`fba_details`.`status` AS `status`,`fba_details`.`SKUs` AS `SKUs`,`fba_details`.`shipped` AS `shipped`,`fba_details`.`received` AS `received`,sum(`fba_new`.`shipped`) AS `sku_table_shipped`,sum(`fba_new`.`received`) AS `sku_table_received`,(`fba_details`.`shipped` - sum(`fba_new`.`shipped`)) AS `shipped_discrepancy`,(`fba_details`.`received` - sum(`fba_new`.`received`)) AS `received_discrepancy`,(case when ((`fba_details`.`shipped` - sum(`fba_new`.`shipped`)) <> 0) then _utf8'warning' when ((`fba_details`.`received` - sum(`fba_new`.`received`)) <> 0) then _utf8'warning' end) AS `warning` from (`fba_shipments_details` `fba_details` left join `fba_shipments_new` `fba_new` on((`fba_new`.`shipment_id` = `fba_details`.`shipment_id`))) group by `fba_details`.`shipment_id` ;

-- --------------------------------------------------------

--
-- Structure for view `fba_shipments_new_view`
--
DROP TABLE IF EXISTS `fba_shipments_new_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasyn`@`localhost` SQL SECURITY DEFINER VIEW `fba_shipments_new_view`  AS  select `fba_shipments_new`.`sku` AS `sku`,sum(`fba_shipments_new`.`shipped`) AS `cumulative_shipped`,sum(`fba_shipments_new`.`received`) AS `cumulative_received` from `fba_shipments_new` where (`fba_shipments_new`.`status` not in (_latin1'Working',_latin1'Cancelled',_latin1'Deleted')) group by `fba_shipments_new`.`sku` ;

-- --------------------------------------------------------

--
-- Structure for view `fba_shipments_report`
--
DROP TABLE IF EXISTS `fba_shipments_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasyn`@`localhost` SQL SECURITY DEFINER VIEW `fba_shipments_report`  AS  select `s1`.`sku` AS `sku`,`s1`.`cumulative_shipped` AS `cumulative_shipped`,`s1`.`cumulative_received` AS `cumulative_received`,`s2`.`units_sold` AS `units_sold`,`s8`.`units_sold_last_28_days` AS `units_sold_last_28_days`,`s9`.`sales_velocity` AS `sales_velocity`,`s10`.`sales_velocity` AS `sales_velocity_amazon_FF_orders`,`s3`.`reimbursements` AS `reimbursements`,((ifnull(`s1`.`cumulative_shipped`,0) - ifnull(`s2`.`units_sold`,0)) - ifnull(`s3`.`reimbursements`,0)) AS `quantity_unsold`,`s4`.`wholesale_price` AS `wholesale_price`,if(((`s4`.`wholesale_price` = '') or isnull(`s4`.`wholesale_price`)),NULL,(((ifnull(`s1`.`cumulative_shipped`,0) - ifnull(`s2`.`units_sold`,0)) - ifnull(`s3`.`reimbursements`,0)) * `s4`.`wholesale_price`)) AS `inventory_value`,(case when (`s4`.`asin` <> '') then convert(`s4`.`asin` using utf8) when (`s5`.`asin` <> '') then `s5`.`asin` when (`s6`.`asin` <> '') then `s6`.`asin` end) AS `asin`,(case when (`s4`.`product_name` <> '') then convert(`s4`.`product_name` using utf8) when (`s5`.`product_name` <> '') then `s5`.`product_name` when (`s6`.`product_name` <> '') then `s6`.`product_name` end) AS `product_name`,`s4`.`supplier` AS `supplier`,`s7`.`last_sold_date` AS `last_sold_date`,`s7`.`last_sold_price` AS `last_sold_price`,`s7`.`last_sold_profit` AS `last_sold_profit`,`s4`.`status` AS `status` from (((((((((`fba_shipments_new_view` `s1` left join `new_settlement_sku_unitssold_view` `s2` on((`s1`.`sku` = `s2`.`unique_id`))) left join `fba_reimbursements_view` `s3` on((`s1`.`sku` = `s3`.`sku`))) left join `supplier_wholesale_price_view` `s4` on((`s1`.`sku` = `s4`.`sku`))) left join `Inventory_FBA_view` `s5` on((`s1`.`sku` = `s5`.`sku`))) left join `Inventory_All_view` `s6` on((`s1`.`sku` = `s6`.`sku`))) left join `new_settlement_transactions_view` `s7` on((`s1`.`sku` = `s7`.`sku`))) left join `new_settlement_transactions_unitsold_28_days_view` `s8` on((`s1`.`sku` = `s8`.`Sku`))) left join `new_settlement_transactions_sales_velocity` `s9` on((`s1`.`sku` = `s9`.`Sku`))) left join `amazon_fulfillment_order_reports_sales_velocity` `s10` on((`s1`.`sku` = `s10`.`Sku`))) ;

-- --------------------------------------------------------

--
-- Structure for view `Inventory_All_view`
--
DROP TABLE IF EXISTS `Inventory_All_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasyn`@`localhost` SQL SECURITY DEFINER VIEW `Inventory_All_view`  AS  select `Inventory_All`.`seller_sku` AS `sku`,group_concat(`Inventory_All`.`asin1` separator '@-#-@') AS `asin1`,group_concat(`Inventory_All`.`asin2` separator '@-#-@') AS `asin2`,group_concat(`Inventory_All`.`asin3` separator '@-#-@') AS `asin3`,group_concat(`Inventory_All`.`item_name` separator '@-#-@') AS `product_name`,(case when (`Inventory_All`.`asin1` <> _utf8'') then `Inventory_All`.`asin1` when (`Inventory_All`.`asin2` <> _utf8'') then `Inventory_All`.`asin2` when (`Inventory_All`.`asin3` <> _utf8'') then `Inventory_All`.`asin3` end) AS `asin` from `Inventory_All` group by `Inventory_All`.`seller_sku` ;

-- --------------------------------------------------------

--
-- Structure for view `Inventory_FBA_view`
--
DROP TABLE IF EXISTS `Inventory_FBA_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasyn`@`localhost` SQL SECURITY DEFINER VIEW `Inventory_FBA_view`  AS  select `Inventory_FBA`.`sku` AS `sku`,group_concat(`Inventory_FBA`.`asin` separator '@-#-@') AS `asin`,group_concat(`Inventory_FBA`.`product_name` separator '@-#-@') AS `product_name` from `Inventory_FBA` group by `Inventory_FBA`.`sku` ;

-- --------------------------------------------------------

--
-- Structure for view `new_settlement_sku_unitssold_sum`
--
DROP TABLE IF EXISTS `new_settlement_sku_unitssold_sum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasyn`@`localhost` SQL SECURITY DEFINER VIEW `new_settlement_sku_unitssold_sum`  AS  select `new_settlement_sku_unitssold`.`unique_id` AS `unique_id`,sum(`new_settlement_sku_unitssold`.`units_sold`) AS `total of units_sold` from `new_settlement_sku_unitssold` group by `new_settlement_sku_unitssold`.`unique_id` order by sum(`new_settlement_sku_unitssold`.`units_sold`) desc ;

-- --------------------------------------------------------

--
-- Structure for view `new_settlement_sku_unitssold_view`
--
DROP TABLE IF EXISTS `new_settlement_sku_unitssold_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasyn`@`localhost` SQL SECURITY DEFINER VIEW `new_settlement_sku_unitssold_view`  AS  select `new_settlement_sku_unitssold`.`unique_id` AS `unique_id`,sum(`new_settlement_sku_unitssold`.`units_sold`) AS `units_sold` from `new_settlement_sku_unitssold` group by `new_settlement_sku_unitssold`.`unique_id` ;

-- --------------------------------------------------------

--
-- Structure for view `new_settlement_transactions_last_28_days_view`
--
DROP TABLE IF EXISTS `new_settlement_transactions_last_28_days_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasyn`@`localhost` SQL SECURITY DEFINER VIEW `new_settlement_transactions_last_28_days_view`  AS  select max(`new_settlement_transactions`.`Date`) AS `max_date`,(max(`new_settlement_transactions`.`Date`) - interval 28 day) AS `min_date` from `new_settlement_transactions` ;

-- --------------------------------------------------------

--
-- Structure for view `new_settlement_transactions_max_date_view`
--
DROP TABLE IF EXISTS `new_settlement_transactions_max_date_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasyn`@`localhost` SQL SECURITY DEFINER VIEW `new_settlement_transactions_max_date_view`  AS  select max(`new_settlement_transactions`.`Date_UTC`) AS `Date_UTC`,`new_settlement_transactions`.`Sku` AS `Sku` from `new_settlement_transactions` group by `new_settlement_transactions`.`Sku` ;

-- --------------------------------------------------------

--
-- Structure for view `new_settlement_transactions_unitsold_28_days_view`
--
DROP TABLE IF EXISTS `new_settlement_transactions_unitsold_28_days_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasyn`@`localhost` SQL SECURITY DEFINER VIEW `new_settlement_transactions_unitsold_28_days_view`  AS  select `n1`.`Sku` AS `Sku`,sum(if(((`n1`.`Date` >= `n2`.`min_date`) and (`n1`.`Date` <= `n2`.`max_date`)),`n1`.`Quantity`,0)) AS `units_sold_last_28_days` from (`new_settlement_transactions` `n1` join `new_settlement_transactions_last_28_days_view` `n2`) group by `n1`.`Sku` ;

-- --------------------------------------------------------

--
-- Structure for view `new_settlement_transactions_view`
--
DROP TABLE IF EXISTS `new_settlement_transactions_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasyn`@`localhost` SQL SECURITY DEFINER VIEW `new_settlement_transactions_view`  AS  select `t`.`Sku` AS `sku`,`t`.`Quantity` AS `Quantity`,`t`.`Date` AS `last_sold_date`,`t`.`OrderPrincipal` AS `last_sold_price`,`t`.`profit` AS `last_sold_profit`,`t`.`Date_UTC` AS `Date_UTC`,`t`.`UniqueLock` AS `UniqueLock` from (`new_settlement_transactions_max_date_view` `m` join `new_settlement_transactions` `t` on(((`t`.`Sku` = `m`.`Sku`) and (`t`.`Date_UTC` = `m`.`Date_UTC`)))) where (`t`.`Quantity` = 1) group by `t`.`Sku` ;

-- --------------------------------------------------------

--
-- Structure for view `supplier_wholesale_price_view`
--
DROP TABLE IF EXISTS `supplier_wholesale_price_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amasyn`@`localhost` SQL SECURITY DEFINER VIEW `supplier_wholesale_price_view`  AS  select `amasyn_search`.`supplier_wholesale_price`.`SKU` AS `sku`,trim(leading _latin1'$' from `amasyn_search`.`supplier_wholesale_price`.`Wholesale Price`) AS `wholesale_price`,`amasyn_search`.`supplier_wholesale_price`.`ASIN` AS `asin`,`amasyn_search`.`supplier_wholesale_price`.`Name` AS `product_name`,`amasyn_search`.`supplier_wholesale_price`.`Supplier` AS `supplier`,`amasyn_search`.`supplier_wholesale_price`.`Status` AS `status` from `amasyn_search`.`supplier_wholesale_price` group by `amasyn_search`.`supplier_wholesale_price`.`SKU` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amazon_fulfillment_order_reports`
--
ALTER TABLE `amazon_fulfillment_order_reports`
  ADD UNIQUE KEY `amazon-order-id` (`amazon-order-id`);

--
-- Indexes for table `amazon_fulfillment_order_reports_sales_velocity`
--
ALTER TABLE `amazon_fulfillment_order_reports_sales_velocity`
  ADD UNIQUE KEY `Sku` (`Sku`);

--
-- Indexes for table `fba_reimbursements`
--
ALTER TABLE `fba_reimbursements`
  ADD PRIMARY KEY (`date`,`reimbursement_id`,`sku`);

--
-- Indexes for table `fba_shipments_details`
--
ALTER TABLE `fba_shipments_details`
  ADD PRIMARY KEY (`shipment_id`);

--
-- Indexes for table `fba_shipments_new`
--
ALTER TABLE `fba_shipments_new`
  ADD PRIMARY KEY (`shipment_id`,`sku`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `Inventory_All`
--
ALTER TABLE `Inventory_All`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UniqueLock` (`UniqueLock`),
  ADD KEY `seller_sku` (`seller_sku`);

--
-- Indexes for table `Inventory_FBA`
--
ALTER TABLE `Inventory_FBA`
  ADD PRIMARY KEY (`FBA_ID`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `inventory_update`
--
ALTER TABLE `inventory_update`
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `table name` (`table name`),
  ADD KEY `identifier_2` (`identifier`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`sku`);

--
-- Indexes for table `item_prices`
--
ALTER TABLE `item_prices`
  ADD UNIQUE KEY `ASIN` (`ASIN`);

--
-- Indexes for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `new_settlement_sku_unitssold`
--
ALTER TABLE `new_settlement_sku_unitssold`
  ADD UNIQUE KEY `UniqueLock` (`UniqueLock`);

--
-- Indexes for table `new_settlement_summary`
--
ALTER TABLE `new_settlement_summary`
  ADD UNIQUE KEY `UniqueLock` (`UniqueLock`);

--
-- Indexes for table `new_settlement_transactions`
--
ALTER TABLE `new_settlement_transactions`
  ADD UNIQUE KEY `UniqueLock` (`UniqueLock`),
  ADD KEY `Sku` (`Sku`),
  ADD KEY `Date_UTC` (`Date_UTC`),
  ADD KEY `Date` (`Date`);

--
-- Indexes for table `new_settlement_transactions_sales_velocity`
--
ALTER TABLE `new_settlement_transactions_sales_velocity`
  ADD UNIQUE KEY `Sku` (`Sku`);

--
-- Indexes for table `new_settlement_transactions_unitsandrevenues_by_brand`
--
ALTER TABLE `new_settlement_transactions_unitsandrevenues_by_brand`
  ADD UNIQUE KEY `Brand` (`Brand`,`SettlementId`);

--
-- Indexes for table `order_reports`
--
ALTER TABLE `order_reports`
  ADD UNIQUE KEY `order-id` (`order-id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `storefront_orders`
--
ALTER TABLE `storefront_orders`
  ADD UNIQUE KEY `order_number` (`order_number`,`type`);

--
-- Indexes for table `store_details`
--
ALTER TABLE `store_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Store SKU` (`Store SKU`);

--
-- Indexes for table `store_inbound`
--
ALTER TABLE `store_inbound`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_ID` (`unique_ID`);

--
-- Indexes for table `store_inbound_shipment`
--
ALTER TABLE `store_inbound_shipment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shipment name` (`shipment name`);

--
-- Indexes for table `store_outbound`
--
ALTER TABLE `store_outbound`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_outbound_bkp`
--
ALTER TABLE `store_outbound_bkp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_outbound_plan`
--
ALTER TABLE `store_outbound_plan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Plan Name` (`Plan Name`);

--
-- Indexes for table `users_shoeannex`
--
ALTER TABLE `users_shoeannex`
  ADD PRIMARY KEY (`SKU`),
  ADD KEY `index_on_sku` (`SKU`),
  ADD KEY `index_on_asin` (`ASIN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Inventory_All`
--
ALTER TABLE `Inventory_All`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177100;
--
-- AUTO_INCREMENT for table `Inventory_FBA`
--
ALTER TABLE `Inventory_FBA`
  MODIFY `FBA_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12808;
--
-- AUTO_INCREMENT for table `store_details`
--
ALTER TABLE `store_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15387;
--
-- AUTO_INCREMENT for table `store_inbound`
--
ALTER TABLE `store_inbound`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT for table `store_inbound_shipment`
--
ALTER TABLE `store_inbound_shipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `store_outbound`
--
ALTER TABLE `store_outbound`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108785;
--
-- AUTO_INCREMENT for table `store_outbound_bkp`
--
ALTER TABLE `store_outbound_bkp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `store_outbound_plan`
--
ALTER TABLE `store_outbound_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=878;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
