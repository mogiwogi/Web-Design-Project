document.addEventListener("DOMContentLoaded", () => {
  console.log("product.js loaded successfully");

  // Get category and productId from URL query string
  const urlParams = new URLSearchParams(window.location.search);
  const category = urlParams.get("category");
  const productId = urlParams.get("productId");

  console.log("Category from URL:", category);
  console.log("Product ID from URL:", productId);

  // Product data with multiple images
  const products = {
    jackets: {
      "1": { name: "Zippered Dyed Sweater - Limited Edition", images: ["Jacket Category/jacket1.jpg", "Jacket Category/jacket 1 (F).png", "Jacket Category/jacket1 (B).jpg"], price: "MYR369.99", description: "High-quality fabric." },
      "2": { name: "Cross Zip Camel", images: ["Jacket Category/jacket2.jpeg", "Jacket Category/jacket2 (F).jpg", "Jacket Category/jacket2 (B).jpg"], price: "MYR469.99", description: "High-quality camel leather jacket." },
      "3": { name: "Reaped Off (Red) - Limited Edition", images: ["Jacket Category/jacket3.jpeg", "Jacket Category/jacket3 (B).jpg", "Jacket Category/jacket3 (F).jpg"], price: "MYR389.99", description: "High-quality and exquisite leather jacket." },
      "4": { name: "Reaped Off - Limited Edition", images: ["Jacket Category/jacket4.jpg", "Jacket Category/jacket4 (B).jpg", "Jacket Category/jacket4 (B2).jpg"], price: "MYR389.99", description: "High-quality and exquisite leather jacket." },
      "5": { name: "Cross Zip Red", images: ["Jacket Category/jacket 5.jpeg", "Jacket Category/jacket5 (B).jpg", "Jacket Category/jacket5 (S).jpg"], price: "MYR666.00", description: "High-quality leather jacket with a unique cross zip." },
      "6": { name: "Cross Zip Black", images: ["Jacket Category/jacket8.jpeg", "Jacket Category/jacket8 (F).jpg", "Jacket Category/jacket8 (B).jpg"], price: "MYR666.00", description: "High-quality leather jacket with a unique cross zip." },
      "7": { name: "Custom Cross Zip Rider", images: ["Jacket Category/jacket6.jpg", "Jacket Category/jacket6 (S).jpg", "Jacket Category/jacket6 (B).jpg"], price: "MYR569.99", description: "Custom high-quality leather jacket made by KmrII himself." },
      "8": { name: "Cross Zip with Detachable Fur", images: ["Jacket Category/jacket7.jpeg", "Jacket Category/jacket7 (F+).jpg", "Jacket Category/jacket7 (F).jpg"], price: "MYR669.99", description: "High-quality leather jacket with detachable Fur." },
    },
    bottoms: {
      "1": { name: "PT 3/4 Leather", images: ["Bottom Category/Pants 1.jpg", "Bottom Category/Pants 1 (F).jpg", "Bottom Category/Pants 1 (B).jpg"], price: "MYR769.99", description: "Stylish jorts mixed with luxury leather." },
      "2": { name: "Transforma Pants", images: ["Bottom Category/Pants 2.jpg", "Bottom Category/Pants 2 (F).jpg", "Bottom Category/Pants 2 (B).jpg"], price: "MYR370.99", description: "Jeans fit for the one chosen." },
      "3": { name: "P. Cargo", images: ["Bottom Category/Pants 3.jpg", "Bottom Category/Pants 3 (F).jpg", "Bottom Category/Pants 3 (B).jpg"], price: "MYR250.00", description: "Utility cargo pants with multiple pockets." },
      "4": { name: "Baggy Fit - Limited Edition", images: ["Bottom Category/Pants 4.jpg", "Bottom Category/Pants 4 (F).jpg", "Bottom Category/Pants 4 (B).jpg"], price: "MYR799.99", description: "Casual but luxury and comfartable denim." },
      "5": { name: "Loose Fit Jeans", images: ["Bottom Category/Pants 5.jpg", "Bottom Category/Pants 5 (F).jpg", "Bottom Category/Pants 5 (B).jpg"], price: "MYR754.99", description: "Loose fit jeans for those with TASTE." },
      "6": { name: "Wrap Over Trousers", images: ["Bottom Category/Pants 6.jpg", "Bottom Category/Pants 6 (F).jpg", "Bottom Category/Pants 6 (B).jpg"], price: "MYR844.99", description: "Beautiful and luxury trousers." },
      "7": { name: "Tailored Trousers", images: ["Bottom Category/Pants 7.jpg", "Bottom Category/Pants 7 (F).jpg", "Bottom Category/Pants 7 (B).jpg"], price: "MYR799.99", description: "Tailored trousers by none other than experts of experts." },
      "8": { name: "Leather Embroided Trousers", images: ["Bottom Category/Pants 8.jpg", "Bottom Category/Pants 8 (F).jpg", "Bottom Category/Pants 8 (B).jpg"], price: "MYR850.99", description: "Leather embroided trousers for those who are chosen." },
    },
    accessories: {
      "1": { name: "Indiana Desert (Necklace) - Limited Edition", images: ["Accessories Category/Accs 1.jpg", "Accessories Category/Accs 1 (F).jpg", "Accessories Category/Accs 1 (B).jpg"], price: "MYR69.99", description: "Hand-crafted necklace." },
      "2": { name: "Intertwined (Earrings)", images: ["Accessories Category/Accs 2.jpg", "Accessories Category/Accs 2 (F).jpg", "Accessories Category/Accs 2 (B).jpg"], price: "MYR85.99", description: "Earrings for those intertwined by fate." },
      "3": { name: "L0ve (Earrings)", images: ["Accessories Category/Accs 3.jpg", "Accessories Category/Accs 3 (F).jpg", "Accessories Category/Accs 3 (B).jpg"], price: "MYR89.99", description: "Earrings for those in love." },
      "4": { name: "Evil Indiana Desert (Necklace)", images: ["Accessories Category/Accs 4.jpg", "Accessories Category/Accs 4 (F).jpg", "Accessories Category/Accs 4 (B).jpg"], price: "MYR69.99", description: "For those who wonder the desert endlessly." },
      "5": { name: "Death Hook (Limited Edition)", images: ["Accessories Category/Accs 5.jpg", "Accessories Category/Accs 5 (F).jpg", "Accessories Category/Accs 5 (B).jpg"], price: "MYR149.99", description: "Hook for items that brings DEATH." },
      "6": { name: "Skulled Hook", images: ["Accessories Category/Accs 6.jpg", "Accessories Category/Accs 6 (F).jpg", "Accessories Category/Accs 6 (B).jpg"], price: "MYR11.99", description: "Skulled hook for pants." },
      "7": { name: "Pucoon 024 (Limited Edition)", images: ["Accessories Category/Accs 7.jpg", "Accessories Category/Accs 7 (F).jpg", "Accessories Category/Accs 7 (B).jpg"], price: "MYR250.99", description: "Small luxury leather pouchbag." },
      "8": { name: "SpiKED (Limited Edition)", images: ["Accessories Category/Accs 8.jpg", "Accessories Category/Accs 8 (F).jpg", "Accessories Category/Accs 8 (B).jpg"], price: "MYR250.99", description: "Stylish limited edition pouchbag with spikes to ward off evil." },
    },
    wallets: {
      "1": { name: "Meteo (Limited Edition)", images: ["Wallet Category/Wallet 1.jpg", "Wallet Category/Wallet 1 (F).jpg", "Wallet Category/Wallet 1 (B).jpg"], price: "MYR269.99", description: "One of one genuine leather wallet." },
      "2": { name: "Magnolia Diamond", images: ["Wallet Category/Wallet 2.jpg", "Wallet Category/Wallet 2 (F).jpg", "Wallet Category/Wallet 2 (B).jpg"], price: "MYR189.99", description: "Beautiful wallet designed by KmRII himself." },
      "3": { name: "Mutant", images: ["Wallet Category/Wallet 3.jpg", "Wallet Category/Wallet 3 (F).jpg", "Wallet Category/Wallet 3 (B).jpg"], price: "MYR150.99", description: "Only mutants shall acquire this wallet." },
      "4": { name: "Black Rhino", images: ["Wallet Category/Wallet 4.jpg", "Wallet Category/Wallet 4 (F).jpg", "Wallet Category/Wallet 4 (B).jpg"], price: "MYR259.99", description: "Genuine leather wallet." },
      "5": { name: "Purple Haze (Limited Edition)", images: ["Wallet Category/Wallet 5.jpg", "Wallet Category/Wallet 5 (F).jpg", "Wallet Category/Wallet 5 (B).jpg"], price: "MYR149.99", description: "Purple diamond in which only some are fated to acquire." },
      "6": { name: "Studded Wallet", images: ["Wallet Category/Wallet 6.jpg", "Wallet Category/Wallet 6 (F).jpg", "Wallet Category/Wallet 6 (B).jpg"], price: "MYR149.99", description: "Studded wallet." },
      "7": { name: "Pucoon 025 (Limited Edition)", images: ["Wallet Category/Wallet 7.jpg", "Wallet Category/Wallet 7 (F).jpg", "Wallet Category/Wallet 7 (B).jpg"], price: "MYR250.99", description: "Limited edition luxury leather wallet." },
      "8": { name: "Snake Skin Chrome Diamond (Limited Edition)", images: ["Wallet Category/Wallet 8.jpg", "Wallet Category/Wallet 8 (F).jpg", "Wallet Category/Wallet 8 (B).jpg"], price: "MYR550.99", description: "One of one pure snake skin w/ chrome diamond as its heart." },
    },
    bags: {
      "1": { name: "Jet Red 01 (One of One)", images: ["Bags Category/Bag 1.jpg", "Bags Category/Bag 1 (F).jpg", "Bags Category/Bag 1 (B).jpg"], price: "MYR999.99", description: "Made purely by KmrII himself." },
      "2": { name: "Jet Black 02 (Limited Edition)", images: ["Bags Category/Bag 2.jpg", "Bags Category/Bag 2 (F).jpg", "Bags Category/Bag 2 (B).jpg"], price: "MYR599.99", description: "Black to resemble the evil residing in YOU." },
      "3": { name: "KILL! Studs", images: ["Bags Category/Bag 3.jpg", "Bags Category/Bag 3 (F).jpg", "Bags Category/Bag 3 (B).jpg"], price: "MYR399.99", description: "A bag spacious enough for your head." },
      "4": { name: "Killer", images: ["Bags Category/Bag 4.jpg", "Bags Category/Bag 4 (F).jpg", "Bags Category/Bag 4 (B).jpg"], price: "MYR499.99", description: "A bag spacious enough for sharp tools." },
      "5": { name: "Pure Scorpion", images: ["Bags Category/Bag 5.jpg", "Bags Category/Bag 5 (F).jpg", "Bags Category/Bag 5 (B).jpg"], price: "MYR499.99", description: "Convenient bag that you can acquire." },
      "6": { name: "Swallowtail White", images: ["Bags Category/Bag 6.jpg", "Bags Category/Bag 6 (F).jpg", "Bags Category/Bag 6 (B).jpg"], price: "MYR499.99", description: "Beautifully designed by KmrII and his team." },
      "7": { name: "World's End (Limited Edition)", images: ["Bags Category/Bag 7.jpg", "Bags Category/Bag 7 (F).jpg", "Bags Category/Bag 7 (B).jpg"], price: "MYR299.99", description: "Limited edition tote bag for those who desires it." },
      "8": { name: "Black Estoc Laptop Bag", images: ["Bags Category/Bag 8.jpg", "Bags Category/Bag 8 (F).jpg", "Bags Category/Bag 8 (B).jpg"], price: "MYR699.99", description: "Bag perfect for students or work rats." },
    }
  };

  // Check if product data is available
  if (products[category] && products[category][productId]) {
    console.log("Product data found:", products[category][productId]);

    const product = products[category][productId];
    const productDetailsContainer = document.getElementById("product-details");

    // Main product image
    const mainImage = document.createElement("img");
    mainImage.src = product.images[0];
    mainImage.alt = product.name;
    mainImage.id = "main-product-image";
    productDetailsContainer.appendChild(mainImage);

    // Product title, price, and description
    const title = document.createElement("h2");
    title.textContent = product.name;
    title.classList.add("product-title");
    const price = document.createElement("p");
    price.classList.add("price");
    price.textContent = product.price;
    const description = document.createElement("p");
    description.classList.add("description");
    description.textContent = product.description;

    productDetailsContainer.appendChild(title);
    productDetailsContainer.appendChild(price);
    productDetailsContainer.appendChild(description);

    // Additional images
    product.images.slice(1).forEach((imageSrc) => {
      const additionalImage = document.createElement("img");
      additionalImage.src = imageSrc;
      additionalImage.alt = `${product.name} - Additional Image`;
      productDetailsContainer.appendChild(additionalImage);
    });
  } else {
    console.log("Product data not found for", category, productId);
    document.getElementById("product-details").textContent = "Product not found";
  }
});
