# SimplexSolver

## Basic

In mathematical optimization, Dantzig's simplex algorithm (or simplex method) is a popular algorithm for linear programming.

The name of the algorithm is derived from the concept of a simplex and was suggested by T. S. Motzkin. Simplices are not actually used in the method, 
but one interpretation of it is that it operates on simplicial cones, and these become proper simplices with an additional constraint. 
The simplicial cones in question are the corners (i.e., the neighborhoods of the vertices) of a geometric object called a polytope. 
The shape of this polytope is defined by the constraints applied to the objective function.

_**Disclaimer: This SimplexSolver was created for educational purposes only. Its author is not responsible for any inaccuracies or errors in the results.**_

## Installation

**All the `dependencies` and `libraries` are included in the package. You do not need to install anything.**

_You will just need a browser to run the solver._

### Steps

1. `Download` or `Clone` the complete directory to your machine.
2. Run `Index.html`
3. Or you can directly visit [Simplex Solver](http://kuldeepsinghsidhu.esy.es/SimplexSolver)
`kuldeepsinghsidhu.esy.es/SimplexSolver`

## Using

Use of this system is pretty intuitive: Press "`Example`" to see an example of a linear programming problem already set up. 
Then modify the example or enter your own linear programming problem in the space below using the same format as the example, and press "`Solve`"

**Note:**
- Do not use commas in large numbers. For instance, enter `100,000` as `100000`.
- The right-hand side of each constraint must be non-negative, so multiply through by `−1` first if necessary.
- The utility is quite flexible with input. For instance, the following format will also be accepted (inequalities separated by commas):
`Maximize p = x+y subject to x+y <= 2, 3x+y >= 4`
- Decimal mode displays all the tableaus (and results) as decimals, rounded to the number of significant digits you select (up to 13, depending on your processor and browser).
- Fraction mode converts all decimals to fractions and displays all the tableaus (and solutions) as fractions.
- Integer Mode eliminates decimals and fractions in all the tableaus (using the method described in the simplex method tutorial) and displays the solution as fractions.
- Mac users: you can use the inequality symbols "`option+<`" and "`option+>`" instead of "`<=`" and "`>=`" if you like _(although some browsers may have difficulties with this)_.
- **Important:** Every variable you use must appear in the objective function (but not necessarily in the constraints). For example, `Maximize p = 0x + 2y + 0z`
- **Solution Display:** Some browsers (including some versions of Internet Explorer) use a proportional width font (like Geneva or Times) in text boxes. This will cause the display of solutions to appear a little messy. You can remedy this by changing the "Sans Serif" font in your browser preferences to "Courier" or some other fixed-width font, and then reloading the page.

## Implementation

- `index.html`: Contains the front-end for the website depenencies of which
are located in `assets` which uses _bootstrap_
- `AboutSimplex.html`: Contains a few more information about Simplex Algorithm.
- `SimplexAlgorithm.pdf`: Is the Article on Simplex Algorithm.
- `assets/js/Solver/simplex.js`: Contains all the functions as _JavaScript_ that Solve the Linear Optimization Problems.

### `assets/js/Solver/simplex.js`



## CREDITS
Kuldeep Singh Sidhu

Github: [github/singhsidhukuldeep](https://github.com/singhsidhukuldeep)
`https://github.com/singhsidhukuldeep`

Website: [Kuldeep Singh Sidhu (Website)](http://kuldeepsinghsidhu.esy.es)
`http://kuldeepsinghsidhu.esy.es`

LinkedIn: [Kuldeep Singh Sidhu (LinkedIn)](https://www.linkedin.com/in/kuldeep-singh-sidhu-96a67170/)
`https://www.linkedin.com/in/kuldeep-singh-sidhu-96a67170/`

