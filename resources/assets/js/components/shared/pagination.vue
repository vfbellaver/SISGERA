<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li :class="{ disabled : source.current_page == 1 }">
                <a class="page-link" href="#" @click="navigate($event,source.current_page-1)">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li :class="{active : source.current_page == page}" v-for="page in pages">
                <span v-if="page == '...'">{{page}}</span>
                <a v-if="page != '...'" class="page-link" href="#" @click="navigate($event,page)">{{page}}</a>
            </li>
            <li :class="{ disabled : source.current_page == source.last_page }">
                <a class="page-link" @click="navigate($event,source.current_page+1)">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>


</template>
<script>
    export default {

        props: {
            source: {},
        },

        data(){
            return {
                pages: [],
            }
        },

        watch: {
            source() {
                let s = this.source;
                this.pages = this.generatePagesArray(s.current_page, s.total, s.per_page, 10);
            }
        },

        methods: {
            navigate(event, page){
                if (page == 0 || page == this.source.last_page + 1) {
                    return;
                }
                event.preventDefault();
                this.$emit('navigate', page);
            },

            generatePagesArray: function (currentPage, collectionLength, rowsPerPage, paginationRange) {
                let pages = [];
                let totalPages = Math.ceil(collectionLength / rowsPerPage);
                let halfWay = Math.ceil(paginationRange / 2);
                let position;

                if (currentPage <= halfWay) {
                    position = 'start';
                } else if (totalPages - halfWay < currentPage) {
                    position = 'end';
                } else {
                    position = 'middle';
                }

                let ellipsesNeeded = paginationRange < totalPages;
                let i = 1;
                while (i <= totalPages && i <= paginationRange) {
                    let pageNumber = this.calculatePageNumber(i, currentPage, paginationRange, totalPages);
                    let openingEllipsesNeeded = (i === 2 && (position === 'middle' || position === 'end'));
                    let closingEllipsesNeeded = (i === paginationRange - 1 && (position === 'middle' || position === 'start'));
                    if (ellipsesNeeded && (openingEllipsesNeeded || closingEllipsesNeeded)) {
                        pages.push('...');
                    } else {
                        pages.push(pageNumber);
                    }
                    i++;
                }
                return pages;
            },

            calculatePageNumber: function (i, currentPage, paginationRange, totalPages) {
                let halfWay = Math.ceil(paginationRange / 2);
                if (i === paginationRange) {
                    return totalPages;
                } else if (i === 1) {
                    return i;
                } else if (paginationRange < totalPages) {
                    if (totalPages - halfWay < currentPage) {
                        return totalPages - paginationRange + i;
                    } else if (halfWay < currentPage) {
                        return currentPage - halfWay + i;
                    } else {
                        return i;
                    }
                } else {
                    return i;
                }
            }
        }
    }
</script>