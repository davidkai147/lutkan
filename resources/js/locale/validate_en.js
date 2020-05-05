!function (n, e) {
  'object' == typeof exports && 'undefined' != typeof module ? module.exports = e() : 'function' == typeof define &&
  define.amd ? define(e) : ((n = n || self).__vee_validate_locale__en = n.__vee_validate_locale__en ||
    {}, n.__vee_validate_locale__en.js = e())
}(this, function () {
  'use strict'
  var n, e = {
    name: 'en', messages: {
      _default: function (n) {return n + 'の値が不正です'},
      after: function (n, e) {return n + 'は' + e[0] + 'の後でなければなりません'},
      alpha: function (n) {return n + 'はアルファベットのみ使用できます'},
      alpha_dash: function (n) {return n + 'は英数字とハイフン、アンダースコアのみ使用できます'},
      alpha_num: function (n) {return n + 'は英数字のみ使用できます'},
      alpha_spaces: function (n) {return n + 'はアルファベットと空白のみ使用できます'},
      before: function (n, e) {return n + 'は' + e[0] + 'よりも前でなければなりません'},
      between: function (n, e) {return n + 'は' + e[0] + 'から' + e[1] + 'の間でなければなりません'},
      confirmed: function (n) {return n + 'が一致しません'},
      credit_card: function (n) {return n + 'が正しくありません'},
      date_between: function (n, e) {return n + 'は' + e[0] + 'から' + e[1] + 'の間でなければなりません'},
      date_format: function (n, e) {return n + 'は' + e[0] + '形式でなければなりません'},
      decimal: function (n, e) {
        void 0 === e && (e = [])
        var t = e[0]
        return void 0 === t && (t = '*'), n + 'を入力してください。'
        // return void 0 === t && (t = '*'), n + 'は整数及び小数点以下' + ('*' === t ? '' : t) + '桁までの数字にしてください'
      },
      digits: function (n, e) {return n + 'は' + e[0] + '桁の数字でなければなりません'},
      dimensions: function (n, e) {return n + 'は幅' + e[0] + 'px、高さ' + e[1] + 'px以内でなければなりません'},
      email: function (n) {return n + 'は有効なメールアドレスではありません'},
      excluded: function (n) {return n + 'は不正な値です'},
      ext: function (n) {return n + 'は有効なファイル形式ではありません'},
      image: function (n) {return n + 'は有効な画像形式ではありません'},
      included: function (n) {return n + 'は有効な値ではありません'},
      ip: function (n) {return n + 'は有効なIPアドレスではありません'},
      is: function (n) {return n + 'が一致しません'},
      is_not: function (n) {return n + 'が一致しています'},
      length: function (n, e) {
        var t = e[0], r = e[1]
        return r ? n + 'は' + t + '文字以上' + r + '文字以下でなければなりません' : n + 'は' + t + '文字でなければなりません'
      },
      max: function (n, e) {return n + 'は' + e[0] + '文字以内で入力してください。'},
      max_value: function (n, e) {return n + e[0] + 'までの数値の入力しか許可しません。'},
      mimes: function (n) {return n + 'は有効なファイル形式ではありません'},
      min: function (n, e) {return n + 'は' + e[0] + '文字以上で入力してください'},
      min_value: function (n, e) {return n + 'は' + e[0] + '以上でなければなりません'},
      numeric: function (n) {return n + 'は数字のみ使用できます'},
      regex: function (n) {return n + 'のフォーマットが正しくありません'},
      required: function (n) {return n + 'は必須項目です'},
      size: function (n, e) {
        var t, r, u, i = e[0]
        return n + 'は' + (t = i, r = 1024, u = 0 == (t = Number(t) * r) ? 0 : Math.floor(Math.log(t) / Math.log(r)), 1 *
          (t / Math.pow(r, u)).toFixed(2) + ' ' + ['Byte', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'][u]) +
          '以内でなければなりません'
      },
      url: function (n) {return n + 'は有効なURLではありません'},
    }, attributes: {},
  }
  return 'undefined' != typeof VeeValidate && VeeValidate.Validator.localize(((n = {})[e.name] = e, n)), e
})
