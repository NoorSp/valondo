{extends file="parent:frontend/detail/tabs/description.tpl"}

{namespace name="frontend/detail/comment"}

{block name="frontend_detail_description"}

	{$smarty.block.parent}

	{if $sArticle.sVoteAverage.count && $theme.cbax_vote_active && !{config name=VoteDisable}}
		<div class="content--reviews">
			<div class="content--reviews-title">
				{s name="DetailVoteHeader"}Kundenbewertungen{/s}
			</div>
			{foreach $sArticle.sVoteComments as $vote key=voteCount}
				{if $voteCount == $theme.cbax_vote_counter}{break}{/if}
				<div class="product--review{if !$theme.cbax_vote_no_styling} review--styling{/if}">
					<div class="entry--header">
						{include file="frontend/_includes/rating.tpl" points=$vote.points base=5}

						<strong class="content--label">{s name="DetailCommentInfoFrom"}{/s}</strong>
						<span class="content--field">{$vote.name}</span>
						<strong class="content--label">{s name="DetailCommentInfoAt"}{/s}</strong>
						<span class="content--field">{$vote.datum|date:"DATE_MEDIUM"}</span>
					</div>
					<div class="entry--content">
						<h4 class="content--title">{$vote.headline}</h4>
						<p class="content--box review--content">{$vote.comment|truncate:200}</p>
					</div>
				</div>
			{/foreach}
			<a href="#content--product-reviews" data-show-tab="true" class="link--publish-comment content--link" title="{s name="DetailCommentShow1"}Alle{/s} {$sArticle.sVoteAverage.count} {s name="DetailCommentShow2"}Bewertungen anzeigen{/s}"><i class="icon--arrow-right"></i> {s name="DetailCommentShow1"}Alle{/s} {$sArticle.sVoteAverage.count} {s name="DetailCommentShow2"}Bewertungen anzeigen{/s}</a><br /><br />
			<a href="#content--product-reviews" data-show-tab="true" class="link--publish-comment btn {$theme.cbax_vote_button} is--full is--center is--icon-right" rel="nofollow" title="{s name="DetailCommentWrite"}Kundenbewertung schreiben{/s}">{s name="DetailCommentWrite"}Kundenbewertung schreiben{/s} <i class="icon--arrow-right"></i></a>
		</div>

		<div style="clear: both;"></div>
	{/if}
{/block}

{* Comment - Item open text fields attr3 *}
{block name='frontend_detail_description_our_comment'}{/block}