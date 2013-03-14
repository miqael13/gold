+<?php
 	 2	
+/**
 	 3	
+ * GeoipComponentTestCase for CakePHP 1.2.x.x (geoip.test.php).
 	 4	
+ *
 	 5	
+ * Copyright (C) Wayne Khan 2010
 	 6	
+ *
 	 7	
+ * This library is free software; you can redistribute it and/or
 	 8	
+ * modify it under the terms of the GNU Lesser General Public
 	 9	
+ * License as published by the Free Software Foundation; either
 	 10	
+ * version 2.1 of the License, or (at your option) any later version.
 	 11	
+ *
 	 12	
+ * This library is distributed in the hope that it will be useful,
 	 13	
+ * but WITHOUT ANY WARRANTY; without even the implied warranty of
 	 14	
+ * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 	 15	
+ * Lesser General Public License for more details.
 	 16	
+ *
 	 17	
+ * You should have received a copy of the GNU Lesser General Public
 	 18	
+ * License along with this library; if not, write to the Free Software
 	 19	
+ * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA
 	 20	
+ */
 	 21	
+class GeoipComponentTestCase extends CakeTestCase {
 	 22	
+  function start() {
 	 23	
+    App::import("component", "Geoip");
 	 24	
+    
 	 25	
+    $controller = new Controller(); // fake controller
 	 26	
+    $this->GeoipComponentTest = new GeoipComponent();
 	 27	
+    $this->GeoipComponentTest->initialize(&$controller);
 	 28	
+  }
 	 29	
+  
 	 30	
+  function testGeoipComponent() {
 	 31	
+    $tests = array(
 	 32	
+      // Google DNS
 	 33	
+      
 	 34	
+      array(
 	 35	
+        "address" => "8.8.8.8",
 	 36	
+        "country_code" => "US",
 	 37	
+        "country_name" => "United States"
 	 38	
+      ),
 	 39	
+      
 	 40	
+      array(
 	 41	
+        "address" => "8.8.4.4",
 	 42	
+        "country_code" => "US",
 	 43	
+        "country_name" => "United States"
 	 44	
+      ),
 	 45	
+      
 	 46	
+      // Singtel DNS
 	 47	
+      
 	 48	
+      array(
 	 49	
+        "address" => "165.21.83.88",
 	 50	
+        "country_code" => "SG",
 	 51	
+        "country_name" => "Singapore"
 	 52	
+      ),
 	 53	
+      
 	 54	
+      array(
 	 55	
+        "address" => "165.21.100.88",
 	 56	
+        "country_code" => "SG",
 	 57	
+        "country_name" => "Singapore"
 	 58	
+      )
 	 59	
+    );
 	 60	
+    
 	 61	
+    for ($i=0, $max=sizeof($tests); $i<$max; $i++) {
 	 62	
+      // 2 per, since GeoipComponent has only 2 public methods
 	 63	
+      
 	 64	
+      $result = $this->GeoipComponentTest->countryCode($tests[$i]["address"]);
 	 65	
+      $this->assertEqual($result, $tests[$i]["country_code"]);
 	 66	
+      
 	 67	
+      $result = $this->GeoipComponentTest->countryName($tests[$i]["address"]);
 	 68	
+      $this->assertEqual($result, $tests[$i]["country_name"]);
 	 69	
+    }
 	 70	
+  }
 	 71	
+}
 	 72	
+?>
 	  	
\ No newline at end of file