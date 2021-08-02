package com.opp.level2;

import java.util.ArrayList;

public class Book {

	private int id;
	private String des;
	private String author;
	private ArrayList<Review> reviews = new ArrayList<>();

	public Book(int id, String des, String author) {
		this.id = id;
		this.des = des;
		this.author = author;
	}

	public void addReview(Review review) {
		this.reviews.add(review);
	}

	@Override
	public String toString() {
		return String.format("user - %d, %s, %s", id, des, reviews);
	}



}
