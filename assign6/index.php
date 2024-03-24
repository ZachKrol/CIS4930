#!/usr/local/bin/php
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MySQL Assignment</title>
  <link rel="stylesheet" href="./../styleNew.css" />
  <link rel="icon" type="image/x-icon" href="../../favicon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script defer src="main.js"></script>
</head>

<body class="d-flex flex-column h-100">
  <div class="container py-3">
    <div class="row m-3">
      <div class="col-12 text-center align-self-center">
        <h1 class="text-primary"><b>Modifiable Movie Table</b><br /></h1>
        <h2 class="text-secondary"><small>Database Tool</small></h2>
        <p class="text-secondary-emphasis">By: Zach Krol</p>
      </div>
    </div>

    <div class="row m-3">
      <div class="col-auto mx-auto">
        <button id="diagram-btn" class="btn btn-primary">Click Here For Table Structure</button>
      </div>
    </div>

    <div class="row m-3">
      <div id="diagram" class="d-none col-8 col-md-6 col-lg-4 mx-auto p-4 bg-primary-subtle border border-primary-subtle border-2 rounded-4">
        <img class="img-fluid" src="./MoviesTable.png" alt="Table of movie attributes" />
      </div>
    </div>

    <div class="row m-3">
      <div class="col table-responsive">
        <table class="table table-hover border">
          <thead class="table-primary">
            <tr>
              <th scope="col">id</th>
              <th scope="col">Title</th>
              <th scope="col">Genre</th>
              <th scope="col">Year</th>
              <th scope="col">IMDb</th>
              <th scope="col">Runtime(min)</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once("./mysql.log.data.php");
            $conn = mysqli_connect($mysql_host, $mysql_login, $mysql_passw, $mysql_database);
            if ($conn->connect_error) {
              die("connection failed:" . $conn->connect_error);
            }

            $sql = "SELECT id, title, genre, year, link, runtime FROM movies";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>" .
                  "<td>" . $row["id"] . "</td>" .
                  "<th>" . $row["title"] . "</th>" .
                  "<td>" . $row["genre"] . "</td>" .
                  "<td>" . $row["year"] . "</td>" .
                  "<td>" .
                  "<a class=\"web\" target=\"_blank\" href=\"" . $row["link"] . "\">Link</a>" .
                  "</td>" .
                  "<td>" . $row["runtime"] . "</td>" .
                  "</tr>";
              }
            }

            $conn->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row m-3">
      <div class="col-auto mx-auto">
        <button id="add-btn" class="btn btn-primary">Add</button>
      </div>
      <div class="col-auto mx-auto">
        <button id="update-btn" class="btn btn-success">Update</button>
      </div>
      <div class="col-auto mx-auto">
        <button id="remove-btn" class="btn btn-danger">Remove</button>
      </div>
    </div>

    <!-- Add Movie Form -->
    <form id="add-form" action="add.php" method="post" autocomplete="off" class="d-none row p-4 m-3 mt-5 bg-primary-subtle border border-primary-subtle border-2 rounded-4">
      <div class="col-auto mx-auto h3 py-1 text-dark text-center">
        Add New Movie
      </div>
      <div class="col-12 mt-1"></div>
      <div class="col-auto h6 py-1 mx-auto text-info rounded-3 text-center">
        Search for movies on the <a target="_blank" href="https://www.imdb.com/">IMDb Website</a>
      </div>

      <!-- id -->
      <input type="hidden" id="idAdd" name="idAdd" value="<?php echo $row['id']; ?>">

      <!-- Title -->
      <div class="col-12 mt-3">
        <div class="form-floating is-invalid">
          <input type="text" id="titleAdd" class="form-control" name="titleAdd" placeholder="Title Placeholder" required />
          <label for="titleAdd">Title</label>
        </div>
        <div id="title-add-feedback" class="d-none invalid-feedback">
          Enter a valid title
        </div>
      </div>

      <!-- Genre -->
      <div class="col-md-5 col-12 mt-3">
        <div class="form-floating is-invalid">
          <select class="form-select" id="genreAdd" name="genreAdd" required>
            <option value="" selected disabled hidden>
              Choose a movie genre
            </option>
            <option value="Action">Action</option>
            <option value="Adult">Adult</option>
            <option value="Adventure">Adventure</option>
            <option value="Animation">Animation</option>
            <option value="Biography">Biography</option>
            <option value="Comedy">Comedy</option>
            <option value="Crime">Crime</option>
            <option value="Documentary">Documentary</option>
            <option value="Drama">Drama</option>
            <option value="Family">Family</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Film Noir">Film Noir</option>
            <option value="Game Show">Game Show</option>
            <option value="History">History</option>
            <option value="Horror">Horror</option>
            <option value="Musical">Musical</option>
            <option value="Music">Music</option>
            <option value="Mystery">Mystery</option>
            <option value="News">News</option>
            <option value="Reality TV">Reality TV</option>
            <option value="Romance">Romance</option>
            <option value="Sci-Fi">Sci-Fi</option>
            <option value="Short">Short</option>
            <option value="Sports">Sports</option>
            <option value="Talk Show">Talk Show</option>
            <option value="Thriller">Thriller</option>
            <option value="War">War</option>
            <option value="Western">Western</option>
          </select>
          <label for="genreAdd">Genre</label>
        </div>
        <div id="genre-add-feedback" class="d-none invalid-feedback">
          Select a genre
        </div>
      </div>

      <!-- Year -->
      <div class="col-md-3 col-6 mt-3">
        <div class="form-floating is-invalid">
          <input type="text" id="yearAdd" class="form-control" name="yearAdd" placeholder="Year Placeholder" required />
          <label for="yearAdd">Year</label>
        </div>
        <div id="year-add-feedback" class="d-none invalid-feedback">
          Enter a valid year
        </div>
      </div>

      <!-- Runtime -->
      <div class="col-md-4 col-6 mt-3">
        <div class="input-group">
          <div class="form-floating is-invalid">
            <input type="text" id="runtimeAdd" class="form-control" name="runtimeAdd" placeholder="Runtime Placeholder" required />
            <label for="runtimeAdd">Runtime</label>
          </div>
          <span class="input-group-text">min</span>
          <div id="runtime-add-feedback" class="d-none invalid-feedback">
            Enter a valid runtime in minutes
          </div>
        </div>
      </div>

      <!-- Link -->
      <div class="col-12 mt-3">
        <div class="input-group">
          <span class="input-group-text">https://</span>
          <div class="form-floating is-invalid">
            <input type="text" id="linkAdd" class="form-control" name="linkAdd" placeholder="Link Placeholder" required />
            <label for="linkAdd">Link</label>
          </div>
          <div id="link-add-feedback" class="d-none invalid-feedback">
            Enter a valid link
          </div>
        </div>
      </div>

      <!-- Form Buttons -->
      <div class="col-12 mt-1"></div>
      <div class="col-auto ms-auto mt-3">
        <input id="reset-add-btn" class="btn btn-secondary" type="reset" value="Reset" />
      </div>
      <div class="col-auto me-auto mt-3">
        <input id="submit-add-btn" class="btn btn-primary" type="submit" value="Submit" />
      </div>
    </form>

    <!-- Update Movie Form -->
    <form id="update-form" action="update.php" method="post" autocomplete="off" class="d-none row p-4 m-3 mt-5 bg-success-subtle border border-success-subtle border-2 rounded-4">
      <div class="col-auto mx-auto h3 py-1 text-dark text-center">
        Select a Movie to Update
      </div>
      <div class="col-12 mt-1"></div>

      <input type="hidden" id="idUpdate" name="idUpdate" value="">

      <!-- Title -->
      <div class="col-12 mt-3">
        <div class="form-floating is-invalid">
          <input type="text" id="titleUpdate" class="form-control" name="titleUpdate" placeholder="Title Placeholder" required />
          <label for="titleUpdate">Title</label>
        </div>
        <div id="title-update-feedback" class="d-none invalid-feedback">
          Enter a valid title
        </div>
      </div>

      <!-- Genre -->
      <div class="col-md-5 col-12 mt-3">
        <div class="form-floating is-invalid">
          <select class="form-select" id="genreUpdate" name="genreUpdate" required>
            <option value="" selected disabled hidden>
              Choose a movie genre
            </option>
            <option value="Action">Action</option>
            <option value="Adult">Adult</option>
            <option value="Adventure">Adventure</option>
            <option value="Animation">Animation</option>
            <option value="Biography">Biography</option>
            <option value="Comedy">Comedy</option>
            <option value="Crime">Crime</option>
            <option value="Documentary">Documentary</option>
            <option value="Drama">Drama</option>
            <option value="Family">Family</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Film Noir">Film Noir</option>
            <option value="Game Show">Game Show</option>
            <option value="History">History</option>
            <option value="Horror">Horror</option>
            <option value="Musical">Musical</option>
            <option value="Music">Music</option>
            <option value="Mystery">Mystery</option>
            <option value="News">News</option>
            <option value="Reality TV">Reality TV</option>
            <option value="Romance">Romance</option>
            <option value="Sci-Fi">Sci-Fi</option>
            <option value="Short">Short</option>
            <option value="Sports">Sports</option>
            <option value="Talk Show">Talk Show</option>
            <option value="Thriller">Thriller</option>
            <option value="War">War</option>
            <option value="Western">Western</option>
          </select>
          <label for="genreUpdate">Genre</label>
        </div>
        <div id="genre-update-feedback" class="d-none invalid-feedback">
          Select a genre
        </div>
      </div>

      <!-- Year -->
      <div class="col-md-3 col-6 mt-3">
        <div class="form-floating is-invalid">
          <input type="text" id="yearUpdate" class="form-control" name="yearUpdate" placeholder="Year Placeholder" required />
          <label for="yearUpdate">Year</label>
        </div>
        <div id="year-update-feedback" class="d-none invalid-feedback">
          Enter a valid year
        </div>
      </div>

      <!-- Runtime -->
      <div class="col-md-4 col-6 mt-3">
        <div class="input-group">
          <div class="form-floating is-invalid">
            <input type="text" id="runtimeUpdate" class="form-control" name="runtimeUpdate" placeholder="Runtime Placeholder" required />
            <label for="runtimeUpdate">Runtime</label>
          </div>
          <span class="input-group-text">min</span>
          <div id="runtime-update-feedback" class="d-none invalid-feedback">
            Enter a valid runtime in minutes
          </div>
        </div>
      </div>

      <!-- Link -->
      <div class="col-12 mt-3">
        <div class="input-group">
          <span class="input-group-text">https://</span>
          <div class="form-floating is-invalid">
            <input type="text" id="linkUpdate" class="form-control" name="linkUpdate" placeholder="Link Placeholder" required />
            <label for="linkUpdate">Link</label>
          </div>
          <div id="link-update-feedback" class="d-none invalid-feedback">
            Enter a valid link
          </div>
        </div>
      </div>

      <!-- Form Buttons -->
      <div class="col-12 mt-1"></div>
      <div class="col-auto ms-auto mt-3">
        <input id="reset-update-btn" class="btn btn-secondary" type="reset" value="Reset" />
      </div>
      <div class="col-auto me-auto mt-3">
        <input id="submit-update-btn" class="btn btn-success" type="submit" value="Update" />
      </div>
    </form>

    <!-- Remove Movie Form -->
    <form id="remove-form" action="remove.php" method="post" autocomplete="off" class="d-none row p-4 m-3 mt-5 bg-danger-subtle border border-danger-subtle border-2 rounded-4">
      <div class="col-auto mx-auto h3 py-1 text-dark text-center">
        Select a Movie to Remove
      </div>
      <div class="col-12 mt-1"></div>

      <input type="hidden" id="idRemove" name="idRemove" value="">
      <input type="hidden" id="titleRemove" name="titleRemove" value="">
      <input type="hidden" id="genreRemove" name="genreRemove" value="">
      <input type="hidden" id="yearRemove" name="yearRemove" value="">
      <input type="hidden" id="runtimeRemove" name="runtimeRemove" value="">
      <input type="hidden" id="linkRemove" name="linkRemove" value="">

      <div class="col-12 table-responsive">
        <table class="table border">
          <tr id="removing" class="table-light">
            <td id="rmvId"></td>
            <th id="rmvTitle"></th>
            <td id="rmvGenre"></td>
            <td id="rmvYear"></td>
            <td id="rmvLink"></td>
            <td id="rmvRuntime"></td>
          </tr>
        </table>
      </div>

      <div class="col-12 mt-1"></div>
      <div class="col-auto mx-auto mt-3">
        <input id="submit-remove-btn" class="btn btn-danger" type="submit" value="Remove" />
      </div>
    </form>

  </div>
  <footer class="container-fluid p-0 mt-auto text-center">
    <div class="p-2 text-bg-dark">&copy; Zach Krol 2023</div>
  </footer>
</body>

</html>