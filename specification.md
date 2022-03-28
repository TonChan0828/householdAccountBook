# 家計簿アプリ　仕様書

  ## 機能
  * 各月ごとの修士を表示する
  * 各カテゴリーの合計値を表示
  * カテゴリーの追加/削除
  * 各カテゴリーに対して野収支を追加/削除
  * 月ごとの家計簿の追加/削除
  * ユーザログイン/ログアウト
  * カテゴリーにポインタを合わせると全項目を表示(オプション)

  ## テーブル
  * users
    * id, name, email, password, updated-at, created_at
  * books
    * id, amount, time_id, category_id, user_id, updated_at, deleted_at
  * category
    * id, name, user_id, updated_at, deleted_at, created_at
  * times
    * id, year, month, user_id, updated_at, created_at, deleted_at

  ## レイアウト　イメージ図
  ![layout](/Users/show/workspace/householdAccountBook/家計簿アプリ_イメージ図.pdf)

  ##　課題
  * デザイン面の修正
  * JS/TSによるフロント処理の追加
    * 各カテゴリーの詳細表示の方法
    * 連続データ追加
  * Docker環境の作成
  * AWSへのデプロイ
  *
