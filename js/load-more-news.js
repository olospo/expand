document.addEventListener('DOMContentLoaded', () => {

  console.log('Load More News JS Loaded');

  const button = document.querySelector('.load-more-news');
  const grid   = document.querySelector('.news-grid');

  console.log('Button:', button);
  console.log('Grid:', grid);

  if (!button || !grid) {
    console.log('Button or grid not found');
    return;
  }

  button.addEventListener('click', async () => {

    console.log('Load More Clicked');

    const currentPage = parseInt(button.dataset.page, 10);
    const nextPage    = currentPage + 1;
    const maxPages    = parseInt(button.dataset.max, 10);

    console.log('Current Page:', currentPage);
    console.log('Next Page:', nextPage);
    console.log('Max Pages:', maxPages);

    button.disabled = true;
    button.textContent = 'Loading...';

    const formData = new FormData();
    formData.append('action', 'load_more_news');
    formData.append('nonce', loadMoreNews.nonce);
    formData.append('page', nextPage);
    formData.append('category', button.dataset.category || '');

    try {

      const response = await fetch(loadMoreNews.ajaxUrl, {
        method: 'POST',
        body: formData
      });

      console.log('Response:', response);

      const result = await response.json();

      console.log('Result:', result);

      if (result.success) {

        grid.insertAdjacentHTML(
          'beforeend',
          result.data.html
        );

        button.dataset.page = nextPage;
        button.disabled = false;
        button.textContent = 'Load more';

        if (nextPage >= maxPages) {
          button.remove();
        }

      } else {

        console.error('AJAX returned error', result);

        button.disabled = false;
        button.textContent = 'Load more';

      }

    } catch (error) {

      console.error('Load More Error:', error);

      button.disabled = false;
      button.textContent = 'Load more';

    }

  });

});