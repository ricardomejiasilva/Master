package com.opp.level2.inheritance;

public class RecipeRunner {

	public static void main(String[] args) {
		Recipe1 recipe = new Recipe1();
		recipe.execute();

		System.out.println(" ");
		RecipeMicrowave recipeMicrowave = new RecipeMicrowave();
		recipeMicrowave.execute();

	}

}
