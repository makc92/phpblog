<?php
$this->layout('admin/layout', ['title' => 'Админ панель']);
$auth = auth();

?>
<h1>Welcome</h1>
<h2>Привет, <?=$auth->getUsername(); ?></h2>
<h3>Только администратор имеет право заходить в админку</h3>
<p>bla bla bla bla bla</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab alias dicta dolor error et eveniet, ex laudantium, magni praesentium soluta tempora, velit voluptatum. Aliquam dolorem laboriosam ut. Accusamus commodi deleniti dicta dolore doloribus enim illo impedit incidunt inventore iste iure minima nam nisi nobis nostrum odio odit officia pariatur, quas quis quos reiciendis rerum saepe sapiente sequi, similique ullam? Deserunt eligendi fuga laudantium maiores nam obcaecati, perferendis quam soluta unde vitae? Accusamus ad adipisci blanditiis fugit illum magnam quisquam sed vel velit. Ab accusamus ad aspernatur aut corporis deleniti deserunt distinctio eius ex id ipsa labore minus molestias nam odio perferendis perspiciatis placeat praesentium quod ratione, repudiandae sed sit, tempore temporibus totam voluptas voluptatem voluptatibus. Consequuntur dolorum est libero! Accusamus, amet, animi aspernatur commodi, consequatur dicta ducimus eius ex facilis laboriosam maiores obcaecati officia quaerat sunt tempora tenetur totam ullam! Cumque dolor dolorem enim explicabo id in inventore ipsa laboriosam nesciunt nisi nulla obcaecati officia perferendis perspiciatis placeat provident, quidem quo quos ratione, vel? Consequatur consequuntur dolores ea eligendi, est impedit magni mollitia odit porro, quod repudiandae ullam! Accusantium ad aperiam corporis, culpa deserunt, earum facilis fugiat illo, iste laborum minima placeat qui sit sunt ullam unde veritatis voluptatum.</p>