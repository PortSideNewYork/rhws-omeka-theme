/*
 * Initial copy from https://github.com/sgbalogh/neatline_peddler/blob/master/exhibits/themes/citations/script.js
 */
	
Neatline.on('start', function() {

	var map = Neatline.request('MAP:getMap');
	
/*
 * This array is now being set up inside show.php
	var filterclasses = ['collection_street_names',
	               'subject_peoples__puerto_ricans',
	               'subject_atlantic_basin',
	               'subject_art_and_literature',
	               'subject_atlantic_basin',
	               'subject_business',
	               'subject_cats',
	               'subject_changing_shoreline',
	               'subject_charitable_organizations',
	               'subject_crime',
	               'subject_erie_basin',
	               'subject_food_and_drink',
	               'subject_health',
	               'subject_individuals',
	               'subject_maps',
	               'subject_maritime__marine_support_businesses',
	               'subject_maritime__ship_repair',
	               'subject_maritime__shipbuilding',
	               'subject_maritime__shipyards',
	               'subject_maritime',
	               'subject_mass_transit',
	               'subject_military',
	               'subject_nature',
	               'subject_peoples__african_americans',
	               'subject_peoples__british',
	               'subject_peoples__dutch',
	               'subject_peoples__italians',
	               'subject_peoples__norwegians',
	               'subject_peoples__puerto_ricans',
	               'subject_real_estate',
	               'subject_recreation',
	               'subject_social_life'
	              ];
*/
	
	/* Reset to have all items on map */
	function resetTriggers() {
/*
		Neatline.vent.trigger('removeFilter', {
			key : 'collection_street_names'
		});
		Neatline.vent.trigger('removeFilter', {
			key : 'subject_peoples__puerto_ricans'
		});
		Neatline.vent.trigger('removeFilter', {
			key : 'subject_atlantic_basin'
		});
		*/
		for ( let index = 0; index < filterclasses.length; ++index ) {
			Neatline.vent.trigger('removeFilter', {
				key : filterclasses[index]
			});

			$('.' + filterclasses[index]).css("font-weight", "normal");
			$('.' + filterclasses[index]).css("text-align", "left");
		
			
		}
	}

	/* For multiple select, need to fiddle with constructing the evaluator:
	 * Neatline.vent.trigger('setFilter', {
     *    key: 'tags',
     *     evaluator: function(record) {
	*      *****: THIS:
     *     return record.hasTag('tag1') || record.hasTag('tag2');
     *     }
	 *  });
	 */

	/** TODO: If user has turned off map overlay, this should not turn it back on.
	 */
	
	for ( let index = 0; index < filterclasses.length; index++ ) {

			$('.' + filterclasses[index]).click(function() {
				resetTriggers();
				Neatline.vent.trigger('setFilter', {
					key : filterclasses[index],
					evaluator : function(record) {
						let testvals = ['map', filterclasses[index]]
						let result = false;
						for (let valind = 0; valind < testvals.length && ! result; valind++) {
							result = record.hasTag(testvals[valind]);
						}
						return result;
					}
				});
				$('.' + filterclasses[index]).css("font-weight", "bold");
				$('.' + filterclasses[index]).css("text-align", "right");
			});
	} // end for loop
/*	
			$('.collection_street_names').click(function() {
				resetTriggers();
				Neatline.vent.trigger('setFilter', {
					key : 'collection_street_names',
					evaluator : function(record) {
						return record.hasTag('collection_street_names');
					}
				});
				
			});
*/
	
/*
	$('.collection_street_names').click(function() {
		resetTriggers();
		Neatline.vent.trigger('setFilter', {
			key : 'collection_street_names',
			evaluator : function(record) {
				return record.hasTag('collection_street_names');
			}
		});
	});

	$('.subject_atlantic_basin').click(function() {
		resetTriggers();
		Neatline.vent.trigger('setFilter', {
			key : 'subject_atlantic_basin',
			evaluator : function(record) {
				return record.hasTag('subject_atlantic_basin');
			}
		});
	});

	$('.subject_peoples__puerto_ricans').click(function() {
		resetTriggers();
		Neatline.vent.trigger('setFilter', {
			key : 'subject_peoples__puerto_ricans',
			evaluator : function(record) {
				return record.hasTag('subject_peoples__puerto_ricans');
			}
		});
	});
*/

			/*
	
	$('.AntiSemiticRhetoric').click(function() {
		Neatline.vent.trigger('setFilter', {
			key : 'AntiSemiticRhetoric',
			evaluator : function(record) {
				return record.hasTag('AntiSemiticRhetoric');
			}
		});
	});
	*/



	
	$('.testA').click(function() {
		Neatline.vent.trigger('setFilter', {
			key : 'tags',
			evaluator : function(record) {
				return record.hasTag('test');
			}
		});
	});

	
/*
	$('.reset').click(function() {
		Neatline.vent.trigger('removeFilter', {
			key : 'collection_street_names'
		});
		Neatline.vent.trigger('removeFilter', {
			key : 'subject_peoples__puerto_ricans'
		});
		Neatline.vent.trigger('removeFilter', {
			key : 'subject_atlantic_basin'
		});
	});
*/
	$('.reset').click(function() {
		/*window.alert("Calling reset");*/
		resetTriggers();
	});
	
	
	$('.btn.out').click(function() {
		map.zoomOut();
	});

});