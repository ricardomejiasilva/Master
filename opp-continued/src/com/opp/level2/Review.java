package com.opp.level2;

public class Review {

	private int id;
	private String des;
	private int rating;

	public Review(int id, String des, int rating) {
		this.id = id;
		this.des = des;
		this.rating = rating;
	}

	@Override
	public String toString() {
		return id + " " + des + " " + rating;
	}
}
