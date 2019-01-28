$('.hero-text').hide();
$('.hero-text').fadeIn(2000);

// Scroll to specific values
// scrollTo is the same

// Scroll certain amounts from current position
window.scrollBy({
  top: 100, // could be negative value
  left: 0,
  behavior: 'smooth'
});

// Scroll to a certain element
document.querySelector('.ourTop').scrollIntoView({
  behavior: 'smooth'
});