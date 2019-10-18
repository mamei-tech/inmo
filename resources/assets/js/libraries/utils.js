//Utilitarios para trabajar con kendo
utils = {
    loadIndicatorDefaultMessage: "Loading...",
    lockCount: 0
};

Resources = {};

function intToTimespan(v) {
    var s = v % 60;
    var m = ((v - s) / 60) % 60;
    var h = ((v - s - m * 60) / 3600);
    return (h > 0 ? ((h > 9 ? "" : "0") + h + ":") : "") + (m > 9 ? "" : "0") + m + (s > 9 ? ":" : ":0") + s;
}

utils.lockScreen = function (m) {
    this.lockCount++;
    this.screenLock.show();
    if (m)
        this.loadIndicator.text(m);
    this.loadIndicator.show();
}
utils.unlockScreen = function () {
    if (this.lockCount > 1) return this.lockCount--;

    this.lockCount--;
    this.screenLock.hide();
    this.loadIndicator.hide();
    this.loadIndicator.text(this.loadIndicatorDefaultMessage);
    return null;
}

utils.init = function () {

    if (undefined === window._)
        console.error("Underscore.js is required");
    if (undefined === window.alertify)
        console.error("Alertify is required");

    this.loadIndicator = $("#load-indicator");
    this.screenLock = $("#screen-lock");

    this.lockCount++;
    this.unlockScreen();
};
$(document).ready(function () {
    utils.init();
});

utils.ShowMessages = function (messages) {
    window._.each(messages, function (e) {
        switch (e.Type) {
            case 0:
            case 1:
                alertify.log(e.Text);
                break;
            case 2:
                alertify.success(e.Text);
                break;
            case 3:
                alertify.log(e.Text, "warning");
                break;
            case 4:
                alertify.error(e.Text);
                break;
            default:
                console.log(e);
        }
    });
}

utils.ajax = function (cfg) {
    cfg._success = cfg.success || function () {
    };
    cfg._error = cfg.error || function () {
    };
    cfg._fail = cfg.fail || function () {
    };
    $(window).trigger("ajaxRequestStart", cfg);
    $.ajax({
        type: cfg.type || "post",
        url: cfg.url,
        data: cfg.data ? JSON.parse(JSON.stringify(cfg.data)) : {},
        context: cfg,
        success: function (r, s, o) {
            $(window).trigger("ajaxRequestEnd", cfg);
            if (r.exec) {
                eval(r.exec);
            }
            if (r.message) {
                if (r.success) {
                    window.alertify ? window.alertify.success(r.message) : utils.Error("", r.message);
                } else {
                    window.alertify ? window.alertify.error(r.message) : utils.Error("", r.message);
                }
            }
            if (r.success) {
                this._success.call(this.context, r, s, o);
            } else {
                this._error.call(this.context, r, s, o);
            }
        },
        error: function () {
            $(window).trigger("ajaxRequestEnd", cfg);
        }
    });
};

utils.Error = function (title, msg) {
    var wnd = utils.createKendoWindow({
        title: title,
        minWidth: 400,
        maxWidth: 620,
        actions: [],
        pinned: true
    });

    wnd.wrapper.addClass("msg-box msg-error");
    wnd.wrapper.find(".k-window-titlebar").prepend('<div class="msg-flag"><span></span></div>');
    wnd.element.append("<div>" + msg + '</div><div class="controls"></div>');

    wnd.btnOk = window.bin.create({
        type: "button",
        text: window.Resources.AceRoyalty.Ok,
        iconCls: "hidden",
        target: wnd.element.find(".controls"),
        window: wnd,
        action: function () {
            this.window.destroy();
        }
    });

    wnd.open().center();
};
utils.Info = function (title, msg) {
    var wnd = utils.createKendoWindow({
        title: title,
        minWidth: 400,
        maxWidth: 620,
        actions: [],
        pinned: true
    });

    wnd.wrapper.addClass("msg-box msg-info");
    wnd.wrapper.find(".k-window-titlebar").prepend('<div class="msg-flag"><span></span></div>');
    wnd.element.append("<div>" + msg + '</div><div class="controls"></div>');

    wnd.btnOk = window.bin.create({
        type: "button",
        text: window.Resources.AceRoyalty.Ok,
        iconCls: "hidden",
        target: wnd.element.find(".controls"),
        window: wnd,
        action: function () {
            this.window.destroy();
        }
    });

    wnd.open().center();
};
utils.Confirm = function (title, msg, callback, context) {
    var wnd = utils.createKendoWindow({
        title: title,
        minWidth: 400,
        maxWidth: 620,
        actions: [],
        pinned: true
    });

    wnd.wrapper.addClass("msg-box msg-warning");
    wnd.wrapper.find(".k-window-titlebar").prepend('<div class="msg-flag"><span></span></div>');
    wnd.element.append("<div>" + msg + '</div><div class="controls"></div>');

    wnd.btnOk = window.bin.create({
        type: "button",
        text: window.Resources.AceRoyalty.Yes,
        iconCls: "hidden",
        target: wnd.element.find(".controls"),
        window: wnd,
        context: context,
        callback: callback,
        action: function () {
            this.callback.call(this.context, "yes", this.window);
        }
    });
    wnd.btnOk = window.bin.create({
        type: "button",
        text: window.Resources.AceRoyalty.No,
        iconCls: "hidden",
        target: wnd.element.find(".controls"),
        window: wnd,
        context: context,
        callback: callback,
        action: function () {
            this.callback.call(this.context, "no", this.window);
        }
    });
    wnd.btnOk = window.bin.create({
        type: "button",
        text: window.Resources.AceRoyalty.Cancel,
        iconCls: "hidden",
        target: wnd.element.find(".controls"),
        window: wnd,
        context: context,
        callback: callback,
        action: function () {
            this.callback.call(this.context, "cancel", this.window);
        }
    });

    wnd.open().center();
};
utils.validation = {
    messages: {
        required: "Este campo es requerido",
        length: "Error de longitud"
    },
    validators: {
        length: function (c, m, args) {
            var l = c.val().length;
            var valid = l >= args[0] && l <= args[1];
            if (!valid)
                utils.validation.addError(c, m);
            return valid;
        },
        required: function (c, m) {
            var valid = c.val() ? true : false;
            if (!valid)
                utils.validation.addError(c, m);
            return valid;
        }
    },
    addError: function (control, error) {
        control.parents(".form-group").addClass("invalid");
        var r = control.parents(".form-group").find(".validation-results");
        if (!r.length) {
            window.alertify.error(error);
            return console.log("No validation results target defined");
        }

        r.append('<span class="validation-error">' + error + "<span>");
        return true;
    },
    validateControl: function (control) {
        var valid = true;
        control.removeClass("invalid");
        var c = control.find(".form-control[data-validation-rules]");
        var r = control.find(".validation-results");

        if (!c.length)
            return true;

        r.empty();

        var data = c.data();
        if (!data || !data.validationRules || !data.validationRules.length)
            return true;

        var rules = data.validationRules.split(" ");

        window._.each(rules, function (rule) {
            var params = rule.split(":");
            var ruleName = params[0];
            var args = params[1] ? params[1].split(",") : null;

            valid = valid ? utils.validation.validators[ruleName](c, utils.validation.messages[ruleName], args) : false;
        });
        return valid;
    },
    clearErrors: function (form) {
        $(form).find(".form-group.invalid").removeClass("invalid");
        $(form).find(".form-group .validation-results").empty();
    },
    validate: function (form, errors) {
        var formValid = true;
        utils.validation.clearErrors(form);
        var controls = $(form).find(".form-group");
        controls.each(function (i, e) {
            var valid = utils.validation.validateControl($(e));
            formValid = formValid ? valid : false;
        });
        if (errors)
            window._.each(errors, function (e, i) {

                var field = i;
                if (window._.isObject(e) && e.field)
                    field = e.field;

                var message = e;
                if (window._.isObject(e) && e.message)
                    message = e.message;


                var t = $(form).find("[name=" + field + "]");
                //_.each(e, function (m) {
                utils.validation.addError(t, message);
                //});
            });

        return formValid;
    }
};

//Configuracion de idioma de los filtros
utils.columnFilterCfg = {
    "messages": {
        "info": "Mostrar filas con valor que",
        "isTrue": "Si",
        "isFalse": "No",
        "filter": "Filtrar",
        "clear": "Limpiar filtro",
        "and": "Y",
        "operator": "Operador",
        "value": "Valor",
        "cancel": "Cancelar"
    },
    "operators": {
        "string": {
            "eq": "Es igual a",
            "neq": "No es igual a",
            "startswith": "Comienza con",
            "endswith": "Termina en",
            "contains": "Contiene",
            "doesnotcontain": "No contiene",
            "isnull": "Is null",
            "isnotnull": "Is not null",
            "isempty": "Is empty",
            "isnotempty": "Is not empty"
        },
        "number": {
            "eq": "Es igual a",
            "neq": "No es igual a",
            "gte": "Es mayor o igual que",
            "gt": "Es mayor que",
            "lte": "Es menor o igual que",
            "lt": "Es menor que",
            "isnull": "Is null",
            "isnotnull": "Is not null"
        },
        "date": {
            "eq": "Es igual a",
            "neq": "No es igual a",
            "gte": "Es posterior o igual a",
            "gt": "Es posterior",
            "lte": "Es anterior o igual a",
            "lt": "Es anterior",
            "isnull": "Is null",
            "isnotnull": "Is not null"
        },
        "enums": {
            "eq": "Es igual a", "neq": "No es igual a", "isnull": "Is null", "isnotnull": "Is not null"
        }
    }
};
//Configuracion de idioma del menu de columnas
utils.columnMenuMessages = {
    filter: "Filtrar",
    columns: "Columnas",
    sortAscending: "Orden ascendente",
    sortDescending: "Orden descendiente",
    done: "Hecho",
    settings: "Configuración de columnas",
    lock: "Cerrar",
    unlock: "Descubrir"
};

utils.createKendoModel = function (config) {
    return window.kendo.observable(config);
};

utils.createKendoWindow = function (config) {
    var el = $('<div id="' + window._.uniqueId("window_") + '" style="display: none;"></div>');
    $(document.body).append(el);

    window._.defaults(config, {
        modal: true,
        iframe: false,
        draggable: true,
        scrollable: true,
        pinned: false,
        resizable: false
    });

    el.kendoWindow(config);
    var cmp = el.data("kendoWindow");
    return cmp;
};

//Ventana con opciones predefinidas para CRUDs
utils.createModelWindow = function (config) {
    window._.defaults(config, {
        context: {actionCreate: false, actionUpdate: false},
        prepareWindow: function () {
        },
        prepareData: function (d) {
            return d;
        },
        prepareDataForEdit: function (d) {
            return d;
        }
    });
    var wnd = this.createKendoWindow(config);
    wnd.element.addClass(" bin-form");//bin
    wnd.element.append(config._formContent);
    wnd.element.append('<div class="form-controls"></div>');

    wnd.showCreate = function (model) {
        this.options.prepareWindow.call(this, model, true);
        this._model = model;
        window.kendo.bind(this.element, model);
        utils.validation.clearErrors(this.element);
        this.title(this.options._titles.create);
        this.btnCreate.show();
        this.btnUpdate.hide();
        this.center().open();
    };

    wnd.showEdit = function (model) {
        this.options.prepareWindow.call(this, model, false);
        this._model = this.options.prepareDataForEdit(model);
        window.kendo.bind(this.element, model);
        utils.validation.clearErrors(this.element);
        this.title(this.options._titles.update);
        this.btnCreate.hide();
        this.btnUpdate.show();
        this.center().open();
    };

    wnd.btnCreate = window.bin.create({
        type: "button",
        text: "Aceptar",
        iconCls: "hidden",
        target: wnd.element.find(".form-controls"),
        window: wnd,
        dataSource: wnd.options.dataSource,
        action: function () {
            if (this.window.options.context.actionCreate)
                this.window.options.context.actionCreate.call(this);
            else {
                if (utils.validation.validate(this.window.element)) {
                    var data;
                    data = this.window._model.toJSON(),
                        data = this.window.options.prepareData.call(this.window, data);
                    data = window._.pick(data, this.window.options._fields);

                    utils.ajax({
                        url: this.window.options._urls.create,
                        data: data,
                        context: this,
                        success: function () {
                            this.window.close();
                            if (this.window.options.onClose)
                                this.window.options.onClose.call(this.window, data);
                            else
                                this.dataSource.read();
                        },
                        //success is false
                        error: function (r) {
                            if (r.errors)
                                utils.validation.validate(this.window.element, r.errors);
                        }
                    });
                }
                else
                    this.window.center();
            }

        }
    });
    wnd.btnUpdate = window.bin.create({
        type: "button",
        text: "Guardar",
        iconCls: "fa fa-save",
        target: wnd.element.find(".form-controls"),
        window: wnd,
        dataSource: wnd.options.dataSource,
        action: function () {
            if (this.window.options.context.actionUpdate)
                this.window.options.context.actionUpdate.call(this);
            else {
                if (utils.validation.validate(this.window.element)) {
                    var data;
                    data = this.window._model.toJSON(),
                        data = this.window.options.prepareData.call(this.window, data);
                    data = window._.pick(data, this.window.options._fields);
                    utils.ajax({
                        url: this.window.options._urls.update,
                        data: data,
                        context: this,
                        success: function (r) {
                            if (r.success) {
                                this.window.close();
                                if (this.window.options.onClose)
                                    this.window.options.onClose.call(this.window, data);
                                else
                                    this.dataSource.read();
                            }
                            else if (r.errors)
                                utils.validation.validate(this.window.element, r.errors);
                        }
                    });
                }
                else
                    this.window.center();
            }
        }
    });
    wnd.btnCancel = window.bin.create({
        type: "button",
        text: "Cancelar",
        iconCls: "hidden",
        target: wnd.element.find(".form-controls"),
        window: wnd,
        action: function () {
            this.window.close();
        }
    });

    return wnd;
};

utils.createKendoDataSource = function (config) {
    if (!window.kendo.data.transports[config.type])
        throw new Error("The kendo.aspnetmvc.min.js script is not included.");

    if (config.urlPrefix) {
        config.transport = window._.defaults(config.transport || {}, {
            create: {url: config.urlPrefix + "Create"},
            read: {url: config.urlPrefix + "Read"},
            update: {url: config.urlPrefix + "Update"},
            destroy: {url: config.urlPrefix + "Delete"}
        });
    }
    window._.defaults(config, {
        serverPaging: true,
        serverSorting: true,
        serverFiltering: true,
        serverGrouping: true,
        serverAggregates: true,
        pageSize: 25,
        page: 1
    });
    var cmp = new window.kendo.data.DataSource(config);
    cmp.bind("requestEnd", function (e) {
        if (e.response) {
            var response = e.response;
            if (response.exec) {
                eval(response.exec);
            }
            if (response.message) {
                utils.Error("Error", response.message);
            }
        }
    });
    return cmp;
};

//Adiciona un grupo de filtros a un DataSource
utils.addFiltersGroup = function (fId, fg, logic, ds) {

    var currentFilter = ds._filter;

    if (!fg) {
        //eliminar
        if (currentFilter) {
            currentFilter.filters = window._.reject(currentFilter.filters, function (e) {
                return e._fId === fId;
            });
        }
        ds.filter(currentFilter);
    }
    else {
        if (currentFilter) {
            currentFilter.logic = "and";

            var f = window._.findWhere(currentFilter.filters, {_fId: fId});

            if (f)
                f.filters = fg;
            else {
                currentFilter.filters.push({
                    _fId: fId,
                    logic: logic || "or",
                    filters: fg
                });
            }
            ds.filter(currentFilter);
        }
        else
            ds.filter({
                logic: "and",
                filters: [{
                    _fId: fId,
                    logic: logic || "or",
                    filters: fg
                }]
            });
    }
};
//Para los combos
utils.createComboDataSource = function (config) {
    if (!window.kendo.data.transports[config.type])
        throw new Error("The kendo.aspnetmvc.min.js script is not included.");

    if (config.urlPrefix) {
        config.transport = {
            read: {url: config.urlPrefix + "Options"}
        };
    }
    window._.defaults(config, {
        serverPaging: false,
        serverSorting: true,
        serverFiltering: true,
        serverGrouping: true,
        serverAggregates: true,
        pageSize: 1000,
        page: 1
    });
    var cmp = new window.kendo.data.DataSource(config);
    cmp.bind("requestEnd", function (e) {
        if (e.response) {
            var response = e.response;
            if (response.exec) {
                eval(response.exec);
            }
            if (response.message) {
                utils.Error("Error", response.message);
            }
        }
    });
    return cmp;
};

utils.createKendoToolBar = function (target, config) {
    window._.defaults(config, {
        context: {actionCreate: false, actionUpdate: false, actionDelete: false}
    });
    $(target).kendoToolBar(config);
    var cmp = $(target).data("kendoToolBar");
    cmp.editItem = function () {
        if (!this.options.window) {
            console.log("Model window is undefined");
            return;
        }
        var item = this.options.dataView._getSelectedItem();
        var sel = item ? [item.toJSON()] : [];
        if (!sel.length)
            sel = this.options.dataView.checkedItems;

        if (sel.length === 1) {
            this.options.context.dataSource = this.options.dataSource;
            this.options.window.options.context = this.options.context;
            this.options.window.showEdit(utils.createKendoModel(sel[0]));
        }
    };
    cmp.deleteItems = function () {
        var sel = this.options.dataView.checkedItems;
        if (!sel || !sel.length)
            sel = [this.options.dataView._getSelectedItem().toJSON()];
        if (sel.length) {
            if (this.options.context.actionDelete) {
                this.options.context.actionDelete.call(this, sel);
            }
            else
                utils.Confirm(
                    window.Resources.AceRoyalty.Confirmation,
                    window.Resources.AceRoyalty[sel.length > 1 ? "EntitiesDeleteConfirmation" : "EntityDeleteConfirmation"],
                    function (button, window) {
                        switch (button) {
                            case "yes":
                                var ds = this.options.dataSource;
                                var url = ds.transport.options.destroy.url;
                                if (!url)
                                    alert("Uy!!!, No se ha definido la ruta para eliminar en el schemaConfig!!");
                                else {
                                    window._.each(sel, function (e) {
                                        utils.ajax({
                                            url: url,
                                            data: e,
                                            context: ds,
                                            success: function () {
                                                this.read();
                                            }
                                        });
                                    });
                                    this.options.dataView.checkedItems = [];
                                    window.destroy();
                                }
                                break;
                            case "no":
                                window.destroy();
                                break;
                            case "cancel":
                                window.destroy();
                                break;
                            default:
                        }
                    },
                    this);
        }
    };

    cmp.addModuleName = function (name, changeWindowsTitle) {
        var id = window._.uniqueId();
        this.add({
            id: id,
            type: "template",
            template: "<span>" + name + "</span>",
            attributes: {"class": "module-title"}
        });
        if (changeWindowsTitle !== false)
            document.title = name;
        //var _el = $("#" + _id).data().template;
    };

    cmp.addFiltersGroup = function (fId, fg, logic) {
        utils.addFiltersGroup(fId, fg, logic, this.options.dataSource);
    };

    cmp.addFilter = function (f, v, o) {
        var tBar = this;
        var filter = v ? {
            field: f,
            operator: o || "eq",
            value: v
        } : null;

        var currentFilter = tBar.options.dataSource._filter;

        if (!filter) {
            //eliminar
            if (currentFilter) {
                currentFilter.filters = window._.reject(currentFilter.filters, function (e) {
                    return e.field === f;
                });
            }
            tBar.options.dataSource.filter(currentFilter);
        }
        else {
            if (currentFilter) {
                currentFilter.logic = "and";
                var fil = window._.findWhere(currentFilter.filters, {field: f});
                if (fil)
                    fil.value = v;
                else {
                    currentFilter.filters.push(filter);
                }
                tBar.options.dataSource.filter(currentFilter);
            }
            else {

                tBar.options.dataSource.filter({
                    logic: "and",
                    filters: [filter]
                });
            }
        }
    };

    //Inserta un filtro en la Toolbar que funciona sobre los campos string 
    //filtrables del dataSource asociado a la toolbar
    cmp.addGlobalFilter = function (logic, fields) {
        var id = window._.uniqueId();
        this.add({
            id: id,
            type: "template",
            template: '<input placeholder="Buscar" style="width: 270px"/>'
        });
        $("#" + id).addClass("easy-filter");
        var el = $("#" + id).data().template;

        el.element.data("toolbar", el.toolbar);

        var lazyFilter = window._.debounce(function (ev) {
            var tBar = $(this).parent().data("toolbar");
            var query = ev.currentTarget.value;

            if (query) {
                var filters = [];
                window._.each(fields || tBar.options.dataSource.options.schema.model.fields, function (e, i) {
                    if (window._.isString(e) || (e.type === "string" && e.filterable !== false)) {
                        filters.push({
                            field: window._.isString(e) ? e : i,
                            operator: "contains",
                            value: query
                        });
                    }
                });
                utils.addFiltersGroup("easyfilter", filters, "or", tBar.options.dataSource);
            }
            else
                utils.addFiltersGroup("easyfilter", false, "or", tBar.options.dataSource);
        }, 300);

        el.element.find("input").keyup(lazyFilter);

        el.element.find("i").click(function () {
            $(this).parent().find("input").val("");
            $(this).parent().find("input").trigger("keyup");
        });
        this.resize();
    };
    cmp.addOptionFilter = function (label, options, width) {
        var id = window._.uniqueId();
        width = width || 150;
        this.add({
            id: id,
            type: "template",
            template: "<label><b>" + label + '</b></label><input style="width: ' + width + 'px;"/>'
        });

        var el = $("#" + id).data().template;

        options.change = options.change || function () {
            var v = this.value(), f = this.options.filterField;
            this.toolbar.addFilter(f, v);
        };

        var combo = el.element.find("input").kendoComboBox(options).data("kendoComboBox");

        combo.toolbar = el.toolbar;

        /*el.element.find('i').click(function (ev) {
            combo.value("");
            combo.trigger("change");
        });*/
        this.resize();
    };

    cmp.addSeparator = function () {
        this.add({type: "separator"});
    };
    cmp.addCreateBtn = function () {
        this.add({
            type: "button",
            spriteCssClass: "fa fa-plus",
            text: "Adicionar",
            showText: "overflow",
            attributes: {"title": "Nuevo"},
            click: function () {
                this.options.context.dataSource = this.options.dataSource;
                this.options.window.options.context = this.options.context;
                this.options.window.showCreate(utils.createKendoModel(this.options.dataModel));
            }
        });
        this.resize();
    };
    cmp.addEditBtn = function () {
        this.add({
            type: "button",
            spriteCssClass: "fa fa-pencil",
            text: "Editar",
            showText: "overflow",
            attributes: {"title": "Editar", "data-single-selection-required": true},
            click: function () {
                this.editItem();
            }
        });
        this.resize();
    };
    cmp.addRefreshBtn = function () {
        this.add({
            type: "button",
            spriteCssClass: "fa fa-refresh",
            text: "Refresh",
            showText: "overflow",
            attributes: {"title": window.messages.refresh},
            click: function () {
                this.options.dataSource.read();
            }
        });
        this.resize();
    };
    cmp.addRemoveBtn = function () {
        this.add({
            type: "button",
            spriteCssClass: "fa fa-trash",
            text: "Eliminar",
            showText: "overflow",
            attributes: {"data-selection-required": true},
            click: function () {
                this.deleteItems();
            }
        });
        this.resize();
    };
    cmp.addSaveBtn = function () {
        this.add({
            type: "button",
            spriteCssClass: "fa fa-save",
            text: "Guardar",
            showText: "overflow",
            //overflow: "always",
            click: function () {
                this.options.dataSource.sync();
            }
        });
        this.resize();
    };

    cmp.dataSelChange = function () {
        var sel = this.checkedItems;
        if (!sel || !sel.length) {
            var item = this._getSelectedItem();
            sel = item ? [this._getSelectedItem()] : [];
        }

        var selCount = sel.length;

        cmp.element.find(".k-button[data-selection-filter=true]").each(function (i, e) {
            var btn = $(e).data("button");
            btn.options.setEnable.call(btn, sel);
        });

        cmp.element.find(".k-button[data-single-selection-required=true]").each(function (i, e) {
            $(e).data("button").enable(selCount === 1);
        });

        cmp.element.find(".k-button[data-selection-required=true]").each(function (i, e) {
            $(e).data("button").enable(selCount);
        });
    };

    if (cmp.options.dataView) {
        if (config.editOnDbclick !== false)
            cmp.options.dataView.content.on("dblclick", "tr", function () {
                cmp.editItem();
            });
        cmp.options.dataView.bind("change", cmp.dataSelChange);
        cmp.options.dataView.bind("dataBound", cmp.dataSelChange);
    }
    return cmp;
};

utils.createKendoGrid = function (target, config) {
    window._.defaults(config, {
        pageable: true,
        //resizable: true,
        reorderable: true,
        sortable: {
            mode: "multiple"
        },
        selectable: "Single, Row",
        filterable: true,
        scrollable: true,
        messages: {
            noRecords: "No hay datos disponibles."
        }
    });

    if (config.columnMenu !== false)
        config.columnMenu = {
            messages: utils.columnMenuMessages
        };
    if (config.pageable !== false)
        config.pageable = {
            buttonCount: 5,
            /*"messages": {
                "display": "Mostrando del {0} al {1} de {2} elementos",
                "empty": "No hay datos.",
                "page": "Página",
                "of": "de {0}",
                "itemsPerPage": "artículos por página",
                "first": "Ir a la primera página",
                "previous": "Ir a la página anterior",
                "next": "Ir a la página siguiente",
                "last": "Ir a la última página",
                "refresh": "Actualizar",
                "morePages": "Mas paginas"
            }*/
        };

    if (config.checkColumn) {
        config.columns = window._.flatten([{
            template: "<input type='checkbox' class='checkbox' />",
            width: 28
        }, config.columns]);
    }

    $(target).kendoGrid(config);
    var cmp = $(target).data("kendoGrid");

    cmp.markCheckeds = function () {
        console.log("You must set 'checkColumn' to true tu call this function");
    };
    if (config.checkColumn) {
        cmp.checkedItems = [];
        cmp.clearCheckeds = function () {
            var view = this.dataSource.view();
            for (var i = 0; i < view.length; i++) {
                if (window._.findWhere(this.checkedItems, {Id: view[i].id})) {
                    this.tbody.find("tr[data-uid='" + view[i].uid + "']")
                    //.addClass("k-state-selected")
                        .removeClass("k-state-ckecked")
                        .find(".checkbox")
                        .attr("checked", false);
                }
            }
            cmp.checkedItems = [];
        };
        cmp.markCheckeds = function () {
            var view = this.dataSource.view();
            for (var i = 0; i < view.length; i++) {
                if (window._.findWhere(this.checkedItems, {Id: view[i].id})) {
                    this.tbody.find("tr[data-uid='" + view[i].uid + "']")
                    //.addClass("k-state-selected")
                        .addClass("k-state-ckecked")
                        .find(".checkbox")
                        .attr("checked", "checked");
                }
            }
        };
        cmp.bind("dataBound", cmp.markCheckeds);

        cmp.selectRow = function () {
            var checked = this.checked,
                row = $(this).closest("tr"),
                dataItem = cmp.dataItem(row);

            if (checked) {
                if (config.checkMode === "single") cmp.clearCheckeds();
                cmp.checkedItems.push(dataItem.toJSON());
                //row.addClass("k-state-selected");
                row.addClass("k-state-ckecked");
            } else {
                cmp.checkedItems = window._.without(cmp.checkedItems, window._.findWhere(cmp.checkedItems, {Id: dataItem.id}));
                //row.removeClass("k-state-selected");
                row.removeClass("k-state-ckecked");
            }
            cmp.trigger("change");
            cmp.trigger("checkedChange");
        };
        cmp.table.on("click", ".checkbox", cmp.selectRow);
    }

    cmp._getSelectedItem = function () {
        return this.dataItem(this.select());
    };
    $(window).on("resize", cmp, function (e) {
        e.data.resize($(".k-grid"));
    });
    return cmp;
};

utils.createKendoComboBox = function (target, config) {
    config.headerTemplate = '<div class="dropdown-header k-widget k-header" style="text-align: center;">' +
        '<a class="k-button">' + "Limpiar</a>" +
        "</div>";

    var cmp = $(target).kendoComboBox(config).data("kendoComboBox");
    cmp.header.find(".k-button").click({cmp: cmp}, function (e) {
        e.data.cmp.select(-1);
    });

    return cmp;
};

utils.createKendoDropDown = function (target, config) {
    config.headerTemplate = '<div class="dropdown-header k-widget k-header" style="text-align: center;">' +
        '<a class="k-button">' + "Limpiar</a>" +
        "</div>";

    var cmp = $(target).kendoDropDownList(config).data("kendoDropDownList");
    cmp.header.find(".k-button").click({cmp: cmp}, function (e) {
        e.data.cmp.select(-1);
    });

    return cmp;
};

utils.extendCombobox = function (target, config, hideDefaultTrigger) {

    if (!target) return target;

    if (hideDefaultTrigger) {
        target._inputWrapper.find("span.k-select").hide();
        target._inputWrapper.find("input").attr("disabled", "on");
        target._inputWrapper.find(".k-icon.k-i-close").css("right", "3px");
        target.enable(false);
        //target._inputWrapper.css('padding', 0);
    }

    //var wrapper = $("<span class='ext-combobox-wrapper' />");
    // var picker = $("<span class='ext-combobox-picker'><i class='fa fa-th-list'></i></span>");
    // target.wrapper.append(wrapper);
    // wrapper.append(target._inputWrapper);
    // wrapper.append(picker);

    var picker = $('<span class="ext-picker" unselectable="on" role="button" tabindex="-1" style="color: #000; right: -22px; padding: 4px; top: 50%; position: absolute;transform: translateY(-50%); cursor: pointer;"><i class="fa fa-th-list" style="font-size: 14px;vertical-align: middle;"></i></span>');
    target._inputWrapper.append(picker);
    target._inputWrapper.css("margin-right", "24px");
    target.picker = picker;
    //enable\disable
    if (target.options.cascadeFrom) {
        var parentCombo = $("#" + target.options.cascadeFrom).data("kendoComboBox");
        if (parentCombo) {
            picker.hide();
            var selChange = function () {
                if (this.value())
                    picker.show();
                else
                    picker.hide();
                /*var flag = false||this.select().length;
                _cmp.element.find('.k-button[data-selection-required=true]').each(function (i, e) {
                    $(e).data("button").enable(flag);
                });*/
            };
            parentCombo.bind("change", selChange);
            parentCombo.bind("cascade", selChange);
            parentCombo.bind("close", selChange);
        }
    }

    picker.click(function () {
        var wnd = utils.createKendoWindow({
            title: window.Resources.AceRoyalty.PleaseSelectAnItem,
            minWidth: 400,
            maxWidth: 600,
            close: function (e) {
                e.sender.destroy();
            }
        });

        wnd.element.addClass("bin bin-form");
        wnd.element.append('<div class="tb" style="text-align:right;"></div>');
        wnd.element.append('<div class="content-body" style="margin: 10px;"></div>');
        wnd.element.append('<div class="form-controls"></div>');

        if (target.options.cascadeFrom) {
            var dsFilter = window._.clone(target.options.dataSource._filter.filters);
            dsFilter = window._.where(dsFilter, {field: target.options.cascadeFromField});
            config.dataSource.filter({
                logic: "and",
                filters: dsFilter
            });
        }

        var tb = utils.createKendoToolBar(wnd.element.find(".tb"), {
            dataSource: config.dataSource
        });

        tb.addGlobalFilter("and", [target.options.dataTextField]);
        tb.addSeparator();
        tb.addRefreshBtn();

        var dataView = utils.createKendoGrid(wnd.element.find(".content-body"), {
            columns: config.columnsCfg,
            height: 200,
            dataSource: config.dataSource,
            columnMenu: false
        });

        dataView.content.on("dblclick", "tr", function () {
            var item = dataView._getSelectedItem();
            if (item) {
                if (hideDefaultTrigger) {
                    target.dataSource.data([item]);
                }
                target.select(target.dataSource.indexOf(window._.findWhere(target.dataSource._data, {Id: item.Id})));
                target.trigger("change");
            } else
                utils.Error("Error", "Seleccione al menos 1");
            wnd.close();
        });

        wnd.btnSelect = window.bin.create({
            type: "button",
            text: "Select",
            iconCls: "hidden",
            target: wnd.element.find(".form-controls"),
            window: wnd,
            combobox: target,
            dataView: dataView,
            action: function () {
                var item = this.dataView._getSelectedItem();
                if (item) {
                    if (hideDefaultTrigger) {
                        target.dataSource.data([item]);
                    }
                    this.combobox.select(this.combobox.dataSource.indexOf(window._.findWhere(this.combobox.dataSource._data, {Id: item.Id})));
                    this.combobox.trigger("change");
                    this.window.close();
                } else
                    utils.Error("Error", "Seleccione al menos un elemento");
            }
        });
        wnd.btnCancel = window.bin.create({
            type: "button",
            text: window.Resources.AceRoyalty.Cancel,
            iconCls: "hidden",
            target: wnd.element.find(".form-controls"),
            window: wnd,
            combobox: target,
            action: function () {
                /*this.combobox.dataSource.filter({
                    logic: "and",
                    filters: dsFilter
                });*/
                this.window.close();
            }
        });

        wnd.open().center();
    });

    return target;
};

utils.createItemPicker = function (config, callback, multiselect, autoDestroy) {
    var wnd = utils.createKendoWindow({
        title: window.Resources.AceRoyalty.PleaseSelectAnItem, //PleaseSelectAtLeastOneItem
        minWidth: 400,
        maxWidth: 600,
        close: function (e) {
            if (autoDestroy)
                e.sender.destroy();
        }
    });

    wnd.element.addClass("bin bin-form");
    wnd.element.append('<div class="tb" style="text-align:right;"></div>');
    wnd.element.append('<div class="content-body" style="margin: 10px;"></div>');
    wnd.element.append('<div class="form-controls"></div>');

    /*if (target.options.cascadeFrom) {
        var dsFilter = _.clone(target.options.dataSource._filter.filters);
        dsFilter = _.where(dsFilter, { field: target.options.cascadeFromField });
        config.dataSource.filter({
            logic: "and",
            filters: dsFilter
        });
    }*/

    var tb = utils.createKendoToolBar(wnd.element.find(".tb"), {
        dataSource: config.dataSource
    });

    tb.addGlobalFilter();//"and", [target.options.dataTextField]
    tb.addSeparator();
    tb.addRefreshBtn();

    var dataView = utils.createKendoGrid(wnd.element.find(".content-body"), {
        columns: config.columnsCfg,
        height: 200,
        checkColumn: multiselect !== false,
        dataSource: config.dataSource
    });

    dataView.content.on("dblclick", "tr", function () {
        var item = dataView._getSelectedItem();
        if (item) {
            if (callback.call(this, [item])) {
                wnd.close();
            }
        } else
            utils.Error("Error", "Seleccione al menos un elemento");
    });

    wnd.btnSelect = window.bin.create({
        type: "button",
        text: "Seleccione",
        iconCls: "hidden",
        target: wnd.element.find(".form-controls"),
        window: wnd,
        dataView: dataView,
        action: function () {

            var items = this.dataView.checkedItems;
            if (!items || !items.length)
                items = [this.dataView._getSelectedItem().toJSON()];

            if (items.length) {
                if (callback.call(this, items)) {
                    this.window.close();
                }
            } else
                utils.Error("Error", "Seleccione al menos un elemento");
        }
    });
    wnd.btnCancel = window.bin.create({
        type: "button",
        text: "Cancelar",
        iconCls: "hidden",
        target: wnd.element.find(".form-controls"),
        window: wnd,
        action: function () {
            this.window.close();
        }
    });

    wnd.open().center();
}

utils.TimeStampToString = function (time) {

    if (time.TotalSeconds <= 0)
        return "0";

    if (time.TotalSeconds < 60)
        return time.Seconds + " " + "sec";


    return time.Seconds + " " + "sec";

    /*if (time.TotalMinutes < 60)
        return "{time.Minutes}:{time.Seconds.ToString("00")} {Language.Resources.MinutesAbbreviation}"
    .ToLower
    ();

    if (time.TotalHours < 60)
        return $"{time.Hours}:{time.Minutes.ToString("00")}:{time.Seconds.ToString("00")} {Language.Resources.HoursAbbreviation}"
        .ToLower();

    /*switch (as.DefaultCounterFrequencyUnit)
    {
        /*case FrequencyUnit.Hour:
            var hours = time.Hours + (time.Days*24);
            return
            $"{hours}:{executionTime.Minutes.ToString("00")}:{executionTime.Seconds.ToString("00")} {Language.Resources.HoursAbbreviation}"
                .ToLower();

        case FrequencyUnit.Month:
            var months = time.Days/31;
            var days = months.ToString(new NumberFormatInfo {NumberDecimalSeparator = "_"}).Split('_')[1];
    return $"{(int) months}{days}:{executionTime.Hours.ToString("00")}:{executionTime.Minutes.ToString("00")}:{executionTime.Seconds.ToString("00")} {Language.Resources.MonthsAbbreviation}"
        .ToLower();

    //case FrequencyUnit.Year:
    //    var years = (double)executionTime.Days / 365;
    //    var m = years.ToString(new NumberFormatInfo { NumberDecimalSeparator = "_" }).Split('_')[1];
    //    return
    //        $"{(int)months}{days}:{executionTime.Hours}:{executionTime.Minutes}:{executionTime.Seconds} {Language.Resources.HourAbbreviation}"
    //            .ToLower();

    default:
return $"{time.Days}:{time.Hours}:{time.Minutes.ToString("00")}:{time.Seconds.ToString("00")} {Language.Resources.DaysAbbreviation}".ToLower();
    }*/
}

//Tiempo en segundos      
utils.TimeToString = function (time) {

    var total = Math.floor(time);
    var seconds = total % 60;
    seconds = seconds > 9 ? seconds : ("0" + seconds);
    total = Math.floor(total / 60);

    if (total <= 0)
        return seconds + " " + "sec";

    var minutes = total % 60;
    minutes = minutes > 9 ? minutes : ("0" + minutes);
    total = Math.floor(total / 60);

    if (total <= 0)
        return minutes + ":" + seconds + " " + "min";

    return total + ":" + minutes + ":" + seconds + " " + "h";

    /* var hours = total % 24;
     hours = hours > 9 ? hours : ('0' + hours);
     total = Math.floor(total / 24);
 
     if (total <= 0)
         return hours + ':' + minutes + ':' + seconds + ' ' + Resources.g.HoursAbbreviation.toLowerCase();
 
     return total + ':' + hours + ':' + minutes + ':' + seconds + ' ' + Resources.g.HoursAbbreviation.toLowerCase();
     /*
     if (time <= 0)
         return "0";
 
     if (time < 60)
         return time + ' ' + Resources.tLang.SecondsAbbreviation.toLowerCase();
 
 
     return time + ' ' + Resources.tLang.SecondsAbbreviation.toLowerCase();
 
     /*if (time.TotalMinutes < 60)
         return "{time.Minutes}:{time.Seconds.ToString("00")} {Language.Resources.MinutesAbbreviation}"
     .ToLower
     ();
 
     if (time.TotalHours < 60)
         return $"{time.Hours}:{time.Minutes.ToString("00")}:{time.Seconds.ToString("00")} {Language.Resources.HoursAbbreviation}"
         .ToLower();
 
     /*switch (tSystemConfigurationValues.DefaultCounterFrequencyUnit)
     {
         /*case FrequencyUnit.Hour:
             var hours = time.Hours + (time.Days*24);
             return
             $"{hours}:{executionTime.Minutes.ToString("00")}:{executionTime.Seconds.ToString("00")} {Language.Resources.HoursAbbreviation}"
                 .ToLower();
 
         case FrequencyUnit.Month:
             var months = time.Days/31;
             var days = months.ToString(new NumberFormatInfo {NumberDecimalSeparator = "_"}).Split('_')[1];
     return $"{(int) months}{days}:{executionTime.Hours.ToString("00")}:{executionTime.Minutes.ToString("00")}:{executionTime.Seconds.ToString("00")} {Language.Resources.MonthsAbbreviation}"
         .ToLower();
 
     //case FrequencyUnit.Year:
     //    var years = (double)executionTime.Days / 365;
     //    var m = years.ToString(new NumberFormatInfo { NumberDecimalSeparator = "_" }).Split('_')[1];
     //    return
     //        $"{(int)months}{days}:{executionTime.Hours}:{executionTime.Minutes}:{executionTime.Seconds} {Language.Resources.HourAbbreviation}"
     //            .ToLower();
 
     default:
 return $"{time.Days}:{time.Hours}:{time.Minutes.ToString("00")}:{time.Seconds.ToString("00")} {Language.Resources.DaysAbbreviation}".ToLower();
     }*/
}