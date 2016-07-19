function nextQuote(reviews){
	i++;
	j++;
	var over = false;
	var review;
	var quote;
	while (over==false){
		review = reviews[i];
    	if(review==null || i<0){			// there is no more review so we start again
        	i=0;
        	j=1;
        	review = reviews[0];
    	}
		if (review.quote==""){				// the selected review has no quote so we move on
			i++;
    	}
		else {
			over=true;
			quote = review.quote;
    	}
	}
	var ans =[];
	ans['quote']=quote;
	ans['i']=i;
	ans['j']=j;
	return ans;
}

function previousQuote(reviews,i,j){
	i--;
	j--;
	var over = false;
	var review;
	var quote;
	while (over==false){
		review = reviews[i];
    	if(review==null || i<0){			// there is no more review so we start again
        	i=0;
        	j=1;
        	review = reviews[0];
    	}
		if (review.quote==""){				// the selected review has no quote so we move on
			i--;
    	}
		else {
			over=true;
			quote = review.quote;
    	}
	}
	var ans =[];
	ans['quote']=quote;
	ans['i']=i;
	ans['j']=j;
	return ans;
}