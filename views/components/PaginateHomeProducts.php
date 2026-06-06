<?php 

$products_per_page = 6; // number of products to display per page
$total_products = count($products);
$total_pages = ceil($total_products / $products_per_page);
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

if(!is_numeric($current_page) || $total_pages < $current_page) {
    return redirect("/");
}

// determine the offset for the SQL query
$offset = ($current_page - 1) * $products_per_page;

// get the products for the current page
$products = array_slice($products, $offset, $products_per_page);
?>
<div class="col-xl-9 col-lg-8 col-md-7">
    <div class="filter-bar d-flex flex-wrap align-items-center">
        <div class="pagination">
            <?php if ($current_page > 1) : ?>
                <a href="?page=<?php echo $current_page - 1; ?>" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <?php if ($i == $current_page) : ?>
                    <a href="#" class="active"><?php echo $i; ?></a>
                <?php elseif ($i == 1 || $i == $total_pages || ($i >= $current_page - 2 && $i <= $current_page + 2)) : ?>
                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php elseif ($i == $current_page - 3 || $i == $current_page + 3) : ?>
                    <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($current_page < $total_pages) : ?>
                <a href="?page=<?php echo $current_page + 1; ?>" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            <?php endif; ?>
        </div>
    </div>

<script>
  // define constants
  const prevArrow = document.querySelector('.prev-arrow');
  const nextArrow = document.querySelector('.next-arrow');
  const pagination = document.querySelector('.pagination');
  const pageLinks = pagination.querySelectorAll('a:not(.prev-arrow):not(.next-arrow):not(.dot-dot)');
  const dots = pagination.querySelector('.dot-dot');

  // define variables
  let currentPage = 1;
  const numPages = pageLinks.length;
  const maxPagesToShow = 5;

  // show/hide page links and dots based on current page
  const updatePagination = () => {
    // hide all page links
    pageLinks.forEach(pageLink => pageLink.style.display = 'none');

    // show active page link and surrounding links if possible
    if (currentPage <= Math.ceil(maxPagesToShow / 2)) {
      // show first maxPagesToShow links
      for (let i = 0; i < maxPagesToShow && i < numPages; i++) {
        pageLinks[i].style.display = 'inline-block';
      }
      if (numPages > maxPagesToShow) dots.style.display = 'inline-block';
    } else if (currentPage > numPages - Math.floor(maxPagesToShow / 2)) {
      // show last maxPagesToShow links
      for (let i = numPages - maxPagesToShow; i < numPages; i++) {
        pageLinks[i].style.display = 'inline-block';
      }
      if (numPages > maxPagesToShow) dots.style.display = 'inline-block';
    } else {
      // show links surrounding current page
      let start = currentPage - Math.floor(maxPagesToShow / 2) - 1;
      let end = currentPage + Math.floor(maxPagesToShow / 2);
      for (let i = start; i < end && i < numPages; i++) {
        pageLinks[i].style.display = 'inline-block';
      }
      dots.style.display = 'inline-block';
    }

    // update active class
    pageLinks.forEach(pageLink => pageLink.classList.remove('active'));
    pageLinks[currentPage - 1].classList.add('active');

    // show/hide prev/next arrow based on current page
    if (currentPage === 1) {
      prevArrow.style.display = 'none';
    } else {
      prevArrow.style.display = 'inline-block';
    }
    if (currentPage === numPages) {
      nextArrow.style.display = 'none';
    } else {
      nextArrow.style.display = 'inline-block';
    }
  };

  // handle prev/next arrow clicks
  prevArrow.addEventListener('click', event => {
    // event.preventDefault();
    if (currentPage > 1) {
      currentPage--;
      updatePagination();
    }
  });
  nextArrow.addEventListener('click', event => {
    // event.preventDefault();
    if (currentPage < numPages) {
      currentPage++;
      updatePagination();
    }
  });
    </script>