const tools = document.querySelectorAll('.lists .select_tool li');

console.log(tools);
tools.forEach((tool) => {
  console.log('hello');
  tool.style.color = 'pink';
});
