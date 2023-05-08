// Get the file input and image preview elements
const imageInput = document.getElementById('image-input');
const imagePreview = document.getElementById('image-preview');

// Listen for changes to the file input
imageInput.addEventListener('change', function () {
  let imgElement = imagePreview.querySelector("img");
  if (imgElement) {
    // Remove the child img element
    imagePreview.removeChild(imgElement);
  }
  // Clear the existing image preview
  imagePreview.innerHTML = '';

  // Loop through the selected files and create a preview image for each one
  for (let file of imageInput.files) {
    // Create a new FileReader object to read the file contents
    const reader = new FileReader();

    // When the FileReader has loaded the file contents, create a new image element and set its source to the base64-encoded file contents
    reader.addEventListener('load', function () {
      const img = document.createElement('img');
      img.src = reader.result;
      img.width = 200;
      img.height = 200;
      imagePreview.appendChild(img);
    });

    // Read the file as a data URL (base64-encoded)
    reader.readAsDataURL(file);
  }
});