export default {

    methods: {

        clearSearch: function() {

            var thisComponent = this;

            if (thisComponent.table.search == '') {
                return false;
            }

            thisComponent.table.search = '';

            thisComponent.refreshModel();

        },

        gotoPage: function(page) {

            var thisComponent = this;

            thisComponent.table.pageJumpTarget = null;

            thisComponent.table.pagination.current_page = page;

            thisComponent.refreshModel();

        },

        gotoURL: function(url) {

            window.location.href = url;

        },

        handleAction: function(action, row) {

            var thisComponent = this;

            var performAction = null;

            if (typeof action == 'function') {
                performAction = action;
            }

            var onRow = null;

            if (row) {
                onRow = row;
            }

            if (performAction) {

                performAction(onRow);

                thisComponent.flag.showActionMenu = null;

            } else {

                console.warn('[datatable::handleAction] No action method passed for this action');

            }

        },

        jumpToPage: function() {

            var thisComponent = this;

            if (isNaN(thisComponent.table.pageJumpTarget) || thisComponent.table.pageJumpTarget < 1 || thisComponent.table.pageJumpTarget > thisComponent.table.pagination.last_page || thisComponent.table.pageJumpTarget == thisComponent.table.pagination.current_page) {
                thisComponent.table.pageJumpTarget = null;
                return false
            }

            thisComponent.gotoPage(thisComponent.table.pageJumpTarget);
            
        },

        renderColumnData: function(row, column) {

            var thisComponent = this;
            
            //do we have a custom renderer for this column?
            if (column.renderer && typeof column.renderer === 'function') {
                return column.renderer(row, column.targetData);
            } else {
                console.warn('No renderer for column: ' + column.id);
            }

            return null;

        },

        sortTable: function(column) {

            var thisComponent = this;

            if (thisComponent.table.sort.by == column) {
                if (thisComponent.table.sort.order == 'asc') {
                    thisComponent.table.sort.order = 'desc';
                } else {
                    thisComponent.table.sort.order = 'asc';
                }
            } else {
                thisComponent.table.sort.by = column;
            }

            thisComponent.getModel();

        }

    },

    watch: {

        'table.search': _.debounce(function() {

            var thisComponent = this;

            thisComponent.table.pagination.current_page = 1;

            thisComponent.refreshModel();

        }, 300)

    }

}